@extends('layouts.admin')

@section('title', 'Produk | TailAdmin - Tailwind CSS Admin Dashboard Template')

@section('content')

    {{--
  PERUBAHAN 1: Blok skrip dipindahkan ke sini, SEBELUM <main>.
  Ini memastikan fungsi productPageData() sudah ada sebelum Alpine.js
  mencoba menjalankannya pada x-data.
--}}
    <script>
        function productPageData() {
            return {
                page: 'videos',
                'loaded': true,
                'darkMode': false,
                'stickyMenu': false,
                'sidebarToggle': false,
                'scrollTop': false,
                isDeleteModalOpen: false,
                productToDeleteId: null,

                // State untuk manajemen tampilan
                view: 'list', // 'list', 'edit'
                selectedProduct: null, // Menyimpan produk yang dipilih untuk diedit
                newImages: [], // Array untuk pratinjau gambar baru
                displayPrice: '',

                // Data master produk
                products: [{
                        id: 1,
                        img: '{{ asset('images/product/product-01.jpg') }}',
                        name: 'Family Room (tipe sungai & dapur)',
                        category: 'Family Room',
                        price: 850000,
                        stock: 63,
                        capacity: 4,
                        images: [
                            '{{ asset('images/product/product-01.jpg') }}',
                            '{{ asset('images/product/product-05.jpg') }}',
                            '{{ asset('images/product/product-02.jpg') }}',
                            '{{ asset('images/product/product-03.jpg') }}',
                            '{{ asset('images/product/product-04.jpg') }}'
                        ],
                        description: 'Dirancang khusus untuk kenyamanan maksimal keluarga, unit Family Room kami adalah pilihan termewah di Villa ini. Dilengkapi dengan dapur pribadi dan pemandangan sungai.'
                    },
                    {
                        id: 2,
                        img: '{{ asset('images/product/product-02.jpg') }}',
                        name: 'Family Room (tipe sungai)',
                        category: 'Family Room',
                        price: 190000,
                        stock: 13,
                        capacity: 4,
                        images: ['{{ asset('images/product/product-02.jpg') }}',
                            '{{ asset('images/product/product-01.jpg') }}'
                        ],
                        description: 'Kamar keluarga dengan pemandangan sungai yang menenangkan.'
                    },
                    {
                        id: 3,
                        img: '{{ asset('images/product/product-03.jpg') }}',
                        name: 'Family Room (tipe gunung)',
                        category: 'Family Room',
                        price: 640000,
                        stock: 635,
                        capacity: 4,
                        images: ['{{ asset('images/product/product-03.jpg') }}',
                            '{{ asset('images/product/product-01.jpg') }}'
                        ],
                        description: 'Kamar keluarga dengan pemandangan gunung yang indah.'
                    },
                    {
                        id: 4,
                        img: '{{ asset('images/product/product-04.jpg') }}',
                        name: 'Twin Bed',
                        category: 'Standard',
                        price: 400000,
                        stock: 67,
                        capacity: 2,
                        images: ['{{ asset('images/product/product-04.jpg') }}',
                            '{{ asset('images/product/product-01.jpg') }}'
                        ],
                        description: 'Kamar standar dengan dua tempat tidur single.'
                    },
                    {
                        id: 5,
                        img: '{{ asset('images/product/product-01.jpg') }}',
                        name: 'Queen Bed',
                        category: 'Standard',
                        price: 420000,
                        stock: 52,
                        capacity: 2,
                        images: ['{{ asset('images/product/product-01.jpg') }}',
                            '{{ asset('images/product/product-02.jpg') }}'
                        ],
                        description: 'Kamar standar dengan satu tempat tidur ukuran queen.'
                    },
                    {
                        id: 6,
                        img: '{{ asset('images/product/product-02.jpg') }}',
                        name: 'Super Deluxe',
                        category: 'Deluxe',
                        price: 190000,
                        stock: 13,
                        capacity: 2,
                        images: ['{{ asset('images/product/product-02.jpg') }}',
                            '{{ asset('images/product/product-03.jpg') }}'
                        ],
                        description: 'Kamar Super Deluxe dengan fasilitas tambahan.'
                    },
                ],

                // Template untuk produk baru
                newProductTemplate: {
                    id: null,
                    img: '{{ asset('images/product/product-placeholder.png') }}', // Gambar default
                    name: '',
                    category: '',
                    price: 0,
                    stock: 0,
                    capacity: 2,
                    images: [],
                    description: ''
                },

                // --- Fungsi Logika ---

                formatPrice(value) {
                    if (!value) return '0';
                    let numberString = String(value).replace(/[^0-9]/g, '');
                    if (numberString === '') return '0';
                    return numberString.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                },

                handleFiles(event) {
                    let files = Array.from(event.target.files);
                    for (let file of files) {
                        this.newImages.push({
                            url: URL.createObjectURL(file),
                            name: file.name
                        });
                    }
                    event.target.value = null;
                },

                removeNewImage(index) {
                    URL.revokeObjectURL(this.newImages[index].url);
                    this.newImages.splice(index, 1);
                },

                editProduct(product) {
                    this.selectedProduct = JSON.parse(JSON.stringify(product));
                    this.displayPrice = this.formatPrice(this.selectedProduct.price);
                    this.newImages = [];
                    this.view = 'edit';
                    window.scrollTo(0, 0);
                },

                showList() {
                    this.selectedProduct = null;
                    this.newImages = [];
                    this.displayPrice = '';
                    this.view = 'list';
                },

                addProductForm() {
                    this.selectedProduct = JSON.parse(JSON.stringify(this.newProductTemplate));
                    this.displayPrice = this.formatPrice(this.selectedProduct.price);
                    this.newImages = [];
                    this.view = 'edit';
                    window.scrollTo(0, 0);
                },

                saveProduct() {
                    this.selectedProduct.price = Number(String(this.displayPrice).replace(/[^0-9]/g, ''));

                    const uploadedImageUrls = this.newImages.map(img => img.url);
                    this.selectedProduct.images.push(...uploadedImageUrls);

                    if (!this.selectedProduct.img && this.selectedProduct.images.length > 0) {
                        this.selectedProduct.img = this.selectedProduct.images[0];
                    } else if (!this.selectedProduct.img) {
                        this.selectedProduct.img = '{{ asset('images/product/product-placeholder.png') }}';
                    }

                    if (this.selectedProduct.id) {
                        const index = this.products.findIndex(p => p.id === this.selectedProduct.id);
                        if (index > -1) {
                            this.products[index] = JSON.parse(JSON.stringify(this.selectedProduct));
                        }
                    } else {
                        this.selectedProduct.id = Date.now();
                        this.products.push(JSON.parse(JSON.stringify(this.selectedProduct)));
                    }

                    console.log('Produk Disimpan:', this.selectedProduct);
                    this.showList();
                },

                deleteProduct() {
                    if (this.productToDeleteId) {
                        this.products = this.products.filter(p => p.id !== this.productToDeleteId);
                        console.log('Produk Dihapus:', this.productToDeleteId);
                        this.productToDeleteId = null;
                        this.isDeleteModalOpen = false;
                    }
                }
            };
        }
    </script>

    <main x-data="productPageData()" class="flex-1 bg-gray-50 dark:bg-gray-900">
        <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">

            <div x-show="view === 'list'" x-transition>
                <div x-data="{ pageName: 'Produk' }">
                    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
                        <h2     class="text-xl font-semibold text-gray-800 dark:text-white/90"     x-text="pageName"  ></h2>

                        <nav>
                            <ol class="flex items-center gap-1.5">
                                <li>
                                    <a
                                        class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400"
                                        href="{{ url('/') }}"        >
                                        Home
                                        <svg             class="stroke-current"             width="17"
                                            height="16"             viewBox="0 0 17 16"             fill="none"
                                            xmlns="http://www.w3.org/2000/svg"          >

                                            <path               d="M6.0765 12.667L10.2432 8.50033L6.0765 4.33366"
                                                stroke=""               stroke-width="1.2"
                                                stroke-linecap="round"               stroke-linejoin="round"             />

                                        </svg>
                                        </a>
                                    </li>
                                <li         class="text-sm text-gray-800 dark:text-white/90"         x-text="pageName"
                                    ></li>
                                </ol>
                            </nav>
                    </div>
                </div>

                <div
                    class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-800 shadow-sm overflow-x-auto mt-6">
                    <table class="w-full text-left">
                        <thead class="border-b border-gray-200 dark:border-gray-700">
                            <tr class="text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                <th class="px-6 py-4">Gambar</th>
                                <th class="px-6 py-4">Kamar</th>
                                <th class="px-6 py-4">Jenis</th>
                                <th class="px-6 py-4">Harga</th>
                                <th class="px-6 py-4">Stok</th>
                                <th class="px-6 py-4">Aksi</th>
                                </tr>
                            </thead>
                        <tbody
                            class="text-sm text-gray-700 dark:text-gray-300 divide-y divide-gray-200 dark:divide-gray-700">

                            <template x-for="product in products" :key="product.id">
                                <tr>
                                    <td class="px-6 py-4">
                                        <img :src="product.img" alt="Kamar"
                                            class="w-10 h-10 rounded-md object-cover" />
                                        </td>
                                    <td class="px-6 py-4 font-medium" x-text="product.name"></td>
                                    <td class="px-6 py-4" x-text="product.category"></td>
                                    <td class="px-6 py-4" x-text="`Rp ${formatPrice(product.price)}`"></td>
                                    <td class="px-6 py-4" x-text="product.stock"></td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <button                       @click="editProduct(product)"

                                                class="text-gray-500 hover:text-blue-500 dark:text-gray-400 dark:hover:text-blue-400"
                                                >
                                                <svg class="w-5 h-5"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor">

                                                    <path
                                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />

                                                    <path fill-rule="evenodd"
                                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                        clip-rule="evenodd" />

                                                </svg>
                                                </button>
                                            <button
                                                @click="productToDeleteId = product.id; isDeleteModalOpen = true"

                                                class="text-gray-500 hover:text-red-500 dark:text-gray-400 dark:hover:text-red-400"
                                                >
                                                <svg class="w-5 h-5"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor">

                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd" />

                                                </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </template>

                            <tr x-show="products.length === 0">
                                <td colspan="6"
                                    class="px-6 py-10 text-center text-gray-500 dark:text-gray-400">
                                    Produk belum ditambahkan.
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                D </div>

            <template x-if="view === 'edit'">
                <div x-transition>
                    <div x-data="{ pageName: selectedProduct.id ? 'Edit Produk' : 'Tambah Produk' }">
                        <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
                            <h2     class="text-xl font-semibold text-gray-800 dark:text-white/90"     x-text="pageName"
                                ></h2>

                            <nav>
                                <ol class="flex items-center gap-1.5">
                                    <li>
                                        <a
                                            class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400"
                                            href="{{ url('/') }}"        >
                                            Home
                                            <svg             class="stroke-current"             width="17"
                                                height="16"             viewBox="0 0 17 16"
                                                fill="none"             xmlns="http://www.w3.org/2000/svg"          >

                                                <path               d="M6.0765 12.667L10.2432 8.50033L6.0765 4.33366"
                                                    stroke=""               stroke-width="1.2"
                                                    stroke-linecap="round"               stroke-linejoin="round"
                                                    />

                                            </svg>
                                            </a>
                                        </li>
                                    <li         class="text-sm text-gray-800 dark:text-white/90"
                                        x-text="pageName"      ></li>
                                    </ol>
                                </nav>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">

                        <div class="lg:col-span-2">
                            <div
                                class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm p-6">

                                <div                 x-data="{
                                    mainImage: selectedProduct.images[0] || '{{ asset('images/product/product-placeholder.png') }}',
                                    activeIndex: 0,
                                    next() {
                                        if (selectedProduct.images.length === 0) return;
                                        this.activeIndex = (this.activeIndex + 1) % selectedProduct.images.length;
                                        this.mainImage = selectedProduct.images[this.activeIndex];
                                    },
                                    prev() {
                                        i
                                        if (selectedProduct.images.length === 0) return;
                                        this.activeIndex = (this.activeIndex - 1 + selectedProduct.images.length) % selectedProduct.images.length;
                                        this.mainImage = selectedProduct.images[this.activeIndex];
                                    }
                                }"              >
                                    <div
                                        class="relative rounded-lg overflow-hidden bg-gray-100 dark:bg-gray-700">
                                        <img :src="mainImage" alt="Family Room"
                                            class="w-full h-auto object-cover aspect-video transition-all duration-300">
                                        <button @click="prev()"
                                            class="absolute top-1/2 left-4 -translate-y-1/2 bg-white/70 hover:bg-white rounded-full p-2 transition-colors z-10">
                                            <svg class="w-5 h-5 text-gray-800" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 19l-7-7 7-7"></path>
                                            </svg>
                                            </button>
                                        <button @click="next()"
                                            class="absolute top-1/2 right-4 -translate-y-1/2 bg-white/70 hover:bg-white rounded-full p-2 transition-colors z-10">
                                            <svg class="w-5 h-5 text-gray-800" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                            </button>
                                        </div>
                                    <div class="grid grid-cols-5 gap-2 mt-4">
                                        <template x-for="(image, index) in selectedProduct.images"
                                            :key="index">
                                            <button
                                                @click="mainImage = image; activeIndex = index"
                                                :class="activeIndex === index ?
                                                    'ring-2 ring-offset-2 ring-gray-700 dark:ring-blue-500' :
                                                    'ring-1 ring-gray-200 dark:ring-gray-700'"
                                                class="rounded-md overflow-hidden transition-all"
                                                >
                                                <img :src="image" alt="Thumbnail"
                                                    class="w-full h-auto object-cover aspect-square">
                                                </button>
                                            </template>
                                        </div>
                                    </div>

                                <div class="mt-6">
                                    <h4 class="text-md font-medium text-gray-800 dark:text-white mb-2">
                                        Upload Gambar Baru</h4>
                                    <label for="file-upload"
                                        class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 transition">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-2 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 16">

                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L7 9m3-3 3 3" />

                                            </svg>
                                            <p class="mb-1 text-sm text-gray-500 dark:text-gray-400">
                                                <span class="font-semibold">Klik untuk upload</span> atau tarik dan lepas
                                            </p>
                                            S                 <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG,
                                                atau GIF (MAX. 800x400px)</p>
                                            </div>
                                        <input id="file-upload" type="file" class="hidden"
                                            @change="handleFiles($event)" multiple />
                                        </label>

                                    <div x-show="newImages.length > 0" class="mt-4">
                                        <h5 class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                            Gambar yang akan di-upload:</h5>
                                        <div
                                            class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 gap-4 mt-2">
                                            <template x-for="(img, index) in newImages"
                                                :key="index">
                                                <div class="relative">
                                                    D     <img :src="img.url"
                                                        class="w-full h-24 object-cover rounded-md border border-gray-200 dark:border-gray-600">
                                                    <button @click="removeNewImage(index)"
                                                        class="absolute -top-2 -right-2 w-6 h-6 bg-red-600 text-white rounded-full flex items-center justify-center text-sm font-bold shadow-md">&times;</button>
                                                    <p
                                                        class="text-xs text-gray-600 dark:text-gray-400 truncate"
                                                        x-text="img.name"></p>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                <div x-data="{ activeTab: 'umum' }" class="mt-8">
                                    <div class="border-b border-gray-200 dark:border-gray-700">
                                        <nav class="flex -mb-px space-x-8" aria-label="Tabs">
                                            <button                       @click="activeTab = 'umum'"

                                                :class="activeTab === 'umum' ?
                                                    'border-gray-700 dark:border-blue-500 text-gray-800 dark:text-white' :
                                                    'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:hover:text-gray-300'"

                                                class="py-4 px-1 border-b-2 font-medium text-sm transition-colors"
                                                >
                                                Gambaran Umum
                                                </button>
                                            <button                       @click="activeTab = 'ulasan'"

                                                :class="activeTab === 'ulasan' ?
                                                    'border-gray-700 dark:border-blue-500 text-gray-800 dark:text-white' :
                                                    'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:hover:text-gray-300'"

                                                class="py-4 px-1 border-b-2 font-medium text-sm transition-colors"
                                                >
                                                Ulasan
                                                </button>
                                            </nav>
                                        </div>
                                    <div class="py-6">
                                        <div x-show="activeTab === 'umum'" x-transition>
                                            <h3
                                                class="text-xl font-semibold text-gray-800 dark:text-white">Deskripsi Kamar
                                            </h3>

                                            <textarea                       x-model="selectedProduct.description"                       rows="5"            
                                                          placeholder="Masukkan deskripsi kamar di sini..."                      
                                                class="w-full mt-4 text-gray-600 dark:text-gray-400 leading-relaxed bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                                                                   ></textarea>

                                        </div>
                                        <div x-show="activeTab === 'ulasan'" x-transition
                                            style="display: none;">
                                            image               <p class="text-gray-600 dark:text-gray-400">Belum ada
                                                ulasan untuk produk ini.</p>
                                            </div>
                                        </div>
                                    _ </div>

                                </div>
                            </div>

                        <div class="lg:col-span-1 space-y-6">
                            <div
                                class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm p-6">
                                <label
                                    class="block text-sm font-medium text-gray-500 dark:text-gray-400">Nama Kamar</label>
                                <input type="text" x-model="selectedProduct.name"
                                    class="text-2xl font-bold text-gray-800 dark:text-white bg-transparent border-0 p-0 w-full focus:ring-0">

                                <label
                                    class="block mt-2 text-sm font-medium text-gray-500 dark:text-gray-400">Tipe
                                    Kamar</label>
                                <input type="text" x-model="selectedProduct.category"
                                    class="text-lg text-gray-600 dark:text-gray-400 bg-transparent border-0 p-0 w-full focus:ring-0">

                                <div class="flex items-center mt-2">
                                    <div class="flex items-center gap-0.5 text-yellow-500">
                                        <template x-for="i in 5">
                                            D     <svg class="w-5 h-5" fill="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">

                                                <path
                                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21L12 17.27z" />

                                            </svg>
                                            </template>
                                        </div>
                                    <span
                                        class="ml-2 text-sm font-medium text-gray-600 dark:text-gray-400">(4.9)</span>
                                    </div>
                                <div class="mt-4">
                                    <label
                                        class="block text-sm font-medium text-gray-500 dark:text-gray-400">Harga per
                                        Malam</label>
                                    <div class="relative">
                                        <span
                                            class="absolute left-2 top-1/2 -translate-y-1/2 text-3xl font-bold text-gray-800 dark:text-white">Rp
                                        </span>
                                        <input                     type="text"
                                            x-model="displayPrice"
                                            @input="$el.value = formatPrice($el.value); displayPrice = $el.value"

                                            class="text-3xl font-bold text-gray-800 dark:text-white bg-transparent border-0 p-0 w-full focus:ring-0 pl-12"
                                            >
                                        </div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">*Harga akhir
                                        pekan. Pajak dan biaya lain tidak termasuk</p>
                                    section           </div>
                                </div>

                            <div x-data="{ stockActive: selectedProduct.stock > 0 }"
                                class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm p-6">
                                <div class="flex items-center justify-between">
                                    <label for="stock"
                                        class="font-medium text-gray-700 dark:text-gray-300">Stok Tersedia</label>
                                    <button                   @click="stockActive = !stockActive"
                                        :class="stockActive ? 'bg-green-600' : 'bg-gray-200 dark:bg-gray-600'"

                                        class="relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none"
                                        role="switch"
                                        :aria-checked="stockActive.toString()"                >
                                        <span
                                            :class="stockActive ? 'translate-x-5' : 'translate-x-0'"
                                            class="inline-block w-5 h-5 rounded-full bg-white dark:bg-gray-300 shadow transform ring-0 transition ease-in-out duration-200"
                                            section              ></span>
                                        </button>
                                    </div>
                                <div class="flex items-center justify-between mt-4">
                                    <label class="font-medium text-gray-700 dark:text-gray-300">Jumlah
                                        Stok</label>
                                    <div class="flex items-center gap-2">
                                        <button
                                            @click="selectedProduct.stock = Math.max(0, selectedProduct.stock - 1)"
                                            class="flex items-center justify-center w-8 h-8 rounded-md border border-gray-300 dark:border-gray-600 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M20 12H4"></path>
                                            </svg>
                                            </button>
                                        <input type="text" x-model.number="selectedProduct.stock"
                                            class="w-12 text-center text-lg font-medium text-gray-800 dark:text-white bg-transparent border-0 p-0 focus:ring-0">
                                        <button @click="selectedProduct.stock++"
                                            class="flex items-center justify-center w-8 h-8 rounded-md border border-gray-300 dark:border-gray-600 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            </button>
                                        </div>
                                    </div>
                                <div class="grid grid-cols-2 gap-4 mt-6">
                                    <button @click="showList()"
                                        class="w-full py-3 px-4 rounded-lg bg-gray-200 text-gray-800 font-medium hover:bg-gray-300 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 transition-colors">
                                        Batal
                                        </button>
                                    <button @click="saveProduct()"
                                        class="w-full py-3 px-4 rounded-lg bg-gray-700 text-white font-medium hover:bg-gray-800 dark:bg-gray-600 dark:hover:bg-gray-500 transition-colors">
                                        Simpan
                                        </button>
                                    </div>
                                </div>

                            <div
                                class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm p-6">
                                section         <div class="flex items-center gap-3">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                                        Click               <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 20h5v-2a3 3 0 00-5.356-2.238M12 6a3 3 0 100-6 3 3 0 000 6zM12 18H3a2 2 0 00-2 2v0h11m0-12a3 3 0 010 6 3 3 0 010-6zM15.3 12.3A5.02 5.02 0 0117 13a5 5 0 015 5v2H2v-2a5 5 0 015-5c.4 0 .8.05 1.18.15">
                                            </path>
                                        </svg>
                                        </div>
                                    <p class="font-medium text-gray-800 dark:text-white">Kapasitas Tamu</p>
                                    </div>

                                <div class="flex items-center justify-between mt-4">
                                    <label class="font-medium text-gray-700 dark:text-gray-300">Jumlah
                                        Tamu</label>
                                    <div class="flex items-center gap-2">
                                        <button
                                            @click="selectedProduct.capacity = Math.max(1, selectedProduct.capacity - 1)"
                                            class="flex items-center justify-center w-8 h-8 rounded-md border border-gray-300 dark:border-gray-600 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                            section               <svg class="w-4 h-4" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M20 12H4"></path>
                                            </svg>
                                            </button>
                                        <input type="text" x-model.number="selectedProduct.capacity"
                                            class="w-12 text-center text-lg font-medium text-gray-800 dark:text-white bg-transparent border-0 p-0 focus:ring-0">
                                        <button @click="selectedProduct.capacity++"
                                            class="flex items-center justify-center w-8 h-8 rounded-md border border-gray-300 dark:border-gray-600 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                            -                 <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            </button>
                                        </div>
                                    D           </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </template>

            <button       x-show="view === 'list'"
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 scale-75"       x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 scale-100"       x-transition:leave-end="opacity-0 scale-75"
                @click="addProductForm()"
                class="fixed right-10 bottom-10 z-30 flex items-center justify-center w-14 h-14 bg-gray-800 rounded-full text-white shadow-lg hover:bg-gray-900 dark:bg-gray-700 dark:hover:bg-gray-600 transition-all"
                >
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">

                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                        clip-rule="evenodd" />

                </svg>
                </button>

            </div>

        {{--
    PERUBAHAN 2: Modal Delete dipindahkan ke sini, di dalam <main>
    tapi di luar div 'p-4' agar bisa mengambil seluruh layar.
    (Catatan: class 'absolute' diganti 'fixed' agar lebih baik)
  --}}
        <div     x-show="isDeleteModalOpen"     x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 scale-95"     x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100 scale-100"     x-transition:leave-end="opacity-0 scale-95"
            class="fixed inset-0 z-50 flex items-center justify-center p-4"     style="display: none"  >
            {{-- Latar belakang gelap --}}
            <div x-show="isDeleteModalOpen" x-transition.opacity class="fixed inset-0 bg-gray-900/50"></div>

            <div       @click.away="isDeleteModalOpen = false; productToDeleteId = null"
                class="w-full max-w-sm p-6 text-center bg-white dark:bg-gray-800 rounded-2xl shadow-xl z-10"    >
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                    Apakah Anda yakin ingin menghapus produk ini?
                    </h3>
                <div class="grid grid-cols-2 gap-4 mt-6">
                    <button           @click="isDeleteModalOpen = false; productToDeleteId = null"
                        class="px-4 py-2.5 font-medium text-white bg-red-600 rounded-lg hover:bg-red-700"        >
                        Batal
                        </button>
                    <button           @click="deleteProduct()"
                        class="px-4 py-2.5 font-medium text-gray-800 bg-gray-100 rounded-lg hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600"
                        >
                        Ya
                        </button>
                    </div>
                </div>

        </div>

    </main>

    {{--
  PERUBAHAN 3: Skrip yang sebelumnya ada di sini sudah dipindahkan ke atas.
--}}
@endsection
