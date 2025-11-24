@extends('layouts/admin')

@section('content')
<body x-data="productPageData({{ Js::from($akomodasi) }})" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{ 'dark bg-gray-900': darkMode === true }">
    @include('components/admin/preloader')
    <div class="flex h-screen overflow-hidden">
        @include('components/admin/sidebar')
        <div class="relative flex flex-1 flex-col overflow-x-hidden overflow-y-auto">
            @include('components/admin/overlay')
            @include('components/admin/header')
            <main class="flex-1 bg-gray-50 dark:bg-gray-900">
                <div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6">

                    @if (session('success'))
                        <div class="bg-green-600 border border-green-300 text-white px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="bg-red-600 border border-red-300 text-white px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="bg-red-600 border border-red-300 text-white px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">Oops! Ada kesalahan:</strong>
                            <ul class="mt-2 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div x-show="view === 'list'" x-transition>
                        <div x-data="{ pageName: 'Produk' }">
                            @include('components/admin/breadcrumb')
                        </div>

                        <div class="mt-6 overflow-x-auto rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-800 dark:bg-gray-800">
                            <table class="w-full text-left">
                                <thead class="border-b border-gray-200 dark:border-gray-700">
                                    <tr class="text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                        <th class="px-6 py-4">Gambar</th>
                                        <th class="px-6 py-4">Tipe Kamar</th>
                                        <th class="px-6 py-4">Jumlah Tamu</th>
                                        <th class="px-6 py-4">Luas Kamar</th>
                                        <th class="px-6 py-4">Tipe Kasur</th>
                                        <th class="px-6 py-4">Harga Asli</th>
                                        <th class="px-6 py-4">Harga Diskon</th>
                                        <th class="px-6 py-4">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 text-sm text-gray-700 dark:divide-gray-700 dark:text-gray-300">
                                    <template x-for="product in products" :key="product.id">
                                        <tr>
                                            <td class="px-6 py-4">
                                                <img :src="getImageArray(product.gambar)[0] || './images/product/product-placeholder.png'" alt="Kamar" class="h-10 w-10 rounded-md object-cover" />
                                            </td>
                                            <td class="px-6 py-4 font-medium" x-text="product.tipe"></td>
                                            <td class="px-6 py-4" x-text="product.jumlah_tamu + ' Orang'"></td>
                                            <td class="px-6 py-4" x-text="product.luas + ' m²'"></td>
                                            <td class="px-6 py-4" x-text="product.tipe_kasur"></td>
                                            <td class="px-6 py-4" x-text="`Rp ${formatPrice(product.harga_asli)}`"></td>
                                            <td class="px-6 py-4" x-text="`Rp ${formatPrice(product.harga_diskon)}`"></td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-3">
                                                    <button @click="editProduct(product)"
                                                        class="text-gray-500 hover:text-blue-500 dark:text-gray-400 dark:hover:text-blue-400">
                                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                    <button @click="productToDeleteId = product.id; isDeleteModalOpen = true"
                                                        class="text-gray-500 hover:text-red-500 dark:text-gray-400 dark:hover:text-red-400">
                                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </template>
                                    <tr x-show="products.length === 0">
                                        <td colspan="6" class="px-6 py-10 text-center text-gray-500 dark:text-gray-400">Produk belum ditambahkan.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <template x-if="view === 'edit'">
                        <div x-transition>
                            <div x-data="{ pageName: selectedProduct.id ? 'Edit Produk' : 'Tambah Produk' }">
                                @include('components/admin/breadcrumb')
                            </div>

                            <form
                                :action="selectedProduct.id ? '/admin/produk/' + selectedProduct.id : '/admin/produk'"
                                method="POST"
                                enctype="multipart/form-data"
                                class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-3"
                            >
                                @csrf
                                <input type="hidden" name="_method" value="PUT" :disabled="!selectedProduct.id">

                                <div class="lg:col-span-2">
                                    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">

                                        <div class="mb-6">

                                            <div x-show="selectedProduct.id && existingImages.length > 0" class="mb-6">
                                                <h5 class="mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Gambar Saat Ini:</h5>
                                                <div class="grid grid-cols-3 gap-4 sm:grid-cols-4 md:grid-cols-5">
                                                    <template x-for="(img, index) in existingImages" :key="'exist-'+index">
                                                        <div class="relative group">
                                                            <img :src="img" class="h-24 w-full rounded-md border border-gray-200 object-cover dark:border-gray-600" />

                                                            <button type="button" @click="removeExistingImage(index)"
                                                                class="absolute -top-2 -right-2 flex h-6 w-6 items-center justify-center rounded-full bg-red-600 text-white shadow-md hover:bg-red-700 focus:outline-none transition-transform hover:scale-110">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                                </svg>
                                                            </button>

                                                            <input type="hidden" name="existing_images[]" :value="img">
                                                        </div>
                                                    </template>
                                                </div>
                                                <hr class="mt-6 border-gray-200 dark:border-gray-700">
                                            </div>

                                            <div class="mt-4">
                                                <h4 class="text-md mb-2 font-medium text-gray-800 dark:text-white">
                                                    <span x-text="selectedProduct.id ? 'Tambah Gambar Baru' : 'Upload Gambar'"></span>
                                                </h4>

                                                <label for="file-upload"
                                                    class="flex h-32 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 transition hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600">
                                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                        <svg class="mb-2 h-8 w-8 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L7 9m3-3 3 3" />
                                                        </svg>
                                                        <p class="mb-1 text-sm text-gray-500 dark:text-gray-400">
                                                            <span class="font-semibold">Klik untuk upload</span>
                                                        </p>
                                                        <p class="text-xs text-gray-500 dark:text-gray-400">Bisa pilih banyak</p>
                                                    </div>
                                                    <input :required="!selectedProduct.id" id="file-upload" type="file" name="gambar[]" class="hidden" @change="handleFiles($event)" multiple accept="image/*" />
                                                </label>

                                                <div x-show="newImages.length > 0" class="mt-4">
                                                    <h5 class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                                        Akan di-upload:
                                                    </h5>
                                                    <div class="mt-2 grid grid-cols-3 gap-4 sm:grid-cols-4 md:grid-cols-6">
                                                        <template x-for="(img, index) in newImages" :key="'new-'+index">
                                                            <div class="relative group">
                                                                <img :src="img.url" class="h-24 w-full rounded-md border border-gray-200 object-cover dark:border-gray-600" />

                                                                <button type="button" @click="removeNewImage(index)"
                                                                    class="absolute -top-2 -right-2 flex h-6 w-6 items-center justify-center rounded-full bg-red-600 text-white shadow-md hover:bg-red-700 focus:outline-none transition-transform hover:scale-110">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                                    </svg>
                                                                </button>
                                                                <p class="mt-1 truncate text-xs text-gray-500" x-text="img.name"></p>
                                                            </div>
                                                        </template>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div x-data="{ activeTab: 'deskripsi' }" class="mt-8">
                                            <div class="border-b border-gray-200 dark:border-gray-700">
                                                <nav class="-mb-px flex space-x-8">
                                                    <button type="button" @click="activeTab = 'deskripsi'"
                                                        :class="activeTab === 'deskripsi' ? 'border-gray-700 dark:border-blue-500 text-gray-800 dark:text-white' : 'border-transparent text-gray-500'"
                                                        class="border-b-2 px-1 py-4 text-sm font-medium transition-colors">Deskripsi</button>
                                                    <button type="button" @click="activeTab = 'fasilitas'"
                                                        :class="activeTab === 'fasilitas' ? 'border-gray-700 dark:border-blue-500 text-gray-800 dark:text-white' : 'border-transparent text-gray-500'"
                                                        class="border-b-2 px-1 py-4 text-sm font-medium transition-colors">Fasilitas</button>
                                                </nav>
                                            </div>
                                            <div class="py-6">
                                                <div x-show="activeTab === 'deskripsi'" x-transition>
                                                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white">Deskripsi Kamar</h3>
                                                    <textarea required placeholder="Masukkan deskripsi kamar" name="deskripsi" x-model="selectedProduct.deskripsi" rows="5" class="mt-4 w-full rounded-md border border-gray-300 bg-white p-2 text-gray-600 dark:bg-gray-800 dark:text-gray-400"></textarea>
                                                </div>
                                                <div x-show="activeTab === 'fasilitas'" x-transition style="display: none">
                                                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white">Fasilitas Kamar</h3>
                                                    <textarea required placeholder="Masukkan fasilitas kamar" name="fasilitas" x-model="selectedProduct.fasilitas" rows="5" class="mt-4 w-full rounded-md border border-gray-300 bg-white p-2 text-gray-600 dark:bg-gray-800 dark:text-gray-400"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-6 lg:col-span-1">
                                    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Nama Tipe Kamar</label>
                                        <input required type="text" name="tipe" x-model="selectedProduct.tipe" class="w-full border-0 bg-transparent p-0 text-2xl font-bold text-gray-800 focus:ring-0 dark:text-white" placeholder="Contoh: Deluxe Room" />

                                        <label class="mt-2 block text-sm font-medium text-gray-500 dark:text-gray-400">Luas Kamar (m²)</label>
                                        <input required type="number" name="luas" x-model="selectedProduct.luas" class="w-full border-0 bg-transparent p-0 text-lg text-gray-600 focus:ring-0 dark:text-gray-400" placeholder="Contoh: 30" />

                                        <label class="mt-2 block text-sm font-medium text-gray-500 dark:text-gray-400">Tipe Kasur</label>
                                        <input required type="text" name="tipe_kasur" x-model="selectedProduct.tipe_kasur" class="w-full border-0 bg-transparent p-0 text-lg text-gray-600 focus:ring-0 dark:text-gray-400" placeholder="Contoh: King" />

                                        <div class="mt-4">
                                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Harga Asli</label>
                                            <div class="relative">
                                                <span class="absolute top-1/2 left-2 -translate-y-1/2 text-3xl font-bold text-gray-800 dark:text-white">Rp</span>
                                                <input required type="text" name="harga_asli" x-model="displayPrice"
                                                    @input="$el.value = formatPrice($el.value); displayPrice = $el.value"
                                                    class="w-full border-0 bg-transparent p-0 pl-12 text-3xl font-bold text-gray-800 focus:ring-0 dark:text-white" />
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Harga Diskon (opsional)</label>
                                            <div class="relative">
                                                <span class="absolute top-1/2 left-2 -translate-y-1/2 text-3xl font-bold text-gray-800 dark:text-white">Rp</span>
                                                <input type="text" name="harga_diskon" x-model="displayDiscount"
                                                    @input="$el.value = formatPrice($el.value); displayDiscount = $el.value"
                                                    class="w-full border-0 bg-transparent p-0 pl-12 text-3xl font-bold text-gray-800 focus:ring-0 dark:text-white" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                                        <div class="flex items-center justify-between">
                                            <label class="font-medium text-gray-700 dark:text-gray-300">Jumlah Tamu</label>
                                            <input required type="hidden" name="jumlah_tamu" :value="selectedProduct.jumlah_tamu">
                                            <div class="flex items-center gap-2">
                                                <button type="button" @click="selectedProduct.jumlah_tamu = Math.max(0, selectedProduct.jumlah_tamu - 1)"
                                                    class="flex h-8 w-8 items-center justify-center rounded-md border border-gray-300 dark:border-gray-600">-</button>
                                                <input type="text" readonly x-model="selectedProduct.jumlah_tamu"
                                                    class="w-12 border-0 bg-transparent p-0 text-center text-lg font-medium text-gray-800 focus:ring-0 dark:text-white" />
                                                <button type="button" @click="selectedProduct.jumlah_tamu++"
                                                    class="flex h-8 w-8 items-center justify-center rounded-md border border-gray-300 dark:border-gray-600">+</button>
                                            </div>
                                        </div>
                                        <div class="mt-4 flex items-center justify-between">
                                            <label class="font-medium text-gray-700 dark:text-gray-300">Smoking Room</label>
                                            <input type="checkbox" name="smoking" x-model="selectedProduct.smoking" class="h-6 w-6 rounded border-gray-300 text-green-600 focus:ring-green-600">
                                        </div>
                                        <div class="mt-4 flex items-center justify-between">
                                            <label class="font-medium text-gray-700 dark:text-gray-300">Kamar Rekomendasi</label>
                                            <input type="checkbox" name="rekomendasi" x-model="selectedProduct.rekomendasi" class="h-6 w-6 rounded border-gray-300 text-green-600 focus:ring-green-600">
                                        </div>
                                    </div>

                                    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                                        <div class="grid grid-cols-2 gap-4">
                                            <button type="button" @click="showList()" class="w-full rounded-lg bg-gray-200 px-4 py-3 font-medium text-gray-800 transition-colors hover:bg-gray-300 dark:bg-gray-700 dark:text-white">Batal</button>
                                            <button type="submit" class="w-full rounded-lg bg-gray-700 px-4 py-3 font-medium text-white transition-colors hover:bg-gray-800 dark:bg-gray-600">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </template>

                    <button x-show="view === 'list'" @click="addProductForm()" class="fixed right-10 bottom-10 z-30 flex h-14 w-14 items-center justify-center rounded-full bg-gray-800 text-white shadow-lg transition-all hover:bg-gray-900 dark:bg-gray-700">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </main>

            <div x-show="isDeleteModalOpen" class="absolute inset-0 z-50 flex items-center justify-center p-4 bg-black/50" style="display: none">
                <div @click.away="isDeleteModalOpen = false; productToDeleteId = null" class="w-full max-w-sm rounded-2xl bg-white p-6 text-center shadow-xl dark:bg-gray-800">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">Apakah Anda yakin ingin menghapus produk ini?</h3>
                    <div class="mt-6 grid grid-cols-2 gap-4">
                        <button @click="isDeleteModalOpen = false; productToDeleteId = null" class="rounded-lg bg-red-600 px-4 py-2.5 font-medium text-white hover:bg-red-700">Batal</button>
                        <form :action="'/admin/produk/' + productToDeleteId" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full rounded-lg bg-gray-100 px-4 py-2.5 font-medium text-gray-800 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300">Ya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function productPageData(dbData) {
            return {
                page: "videos",
                loaded: true,
                darkMode: false,
                stickyMenu: false,
                sidebarToggle: false,
                scrollTop: false,
                isDeleteModalOpen: false,
                productToDeleteId: null,

                view: "list",
                selectedProduct: null,

                newImages: [],
                existingImages: [],

                displayPrice: "",
                displayDiscount: "",
                products: dbData,

                newProductTemplate: {
                    id: null,
                    tipe: "",
                    harga_asli: 0,
                    harga_diskon: null,
                    jumlah_tamu: 2,
                    luas: "",
                    tipe_kasur: "",
                    deskripsi: "",
                    fasilitas: "",
                    smoking: false,
                    rekomendasi: false,
                    gambar: ""
                },

                getImageArray(gambarString) {
                    if(!gambarString) return [];
                    return gambarString.split(',');
                },

                formatPrice(value) {
                    if (!value) return "0";
                    let numberString = String(value).replace(/[^0-9]/g, "");
                    if (numberString === "") return "0";
                    return numberString.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                },

                handleFiles(event) {
                    const input = event.target;
                    const files = Array.from(input.files);

                    this.newImages = [];

                    files.forEach(file => {
                        this.newImages.push({
                            url: URL.createObjectURL(file),
                            name: file.name
                        });
                    });
                },

                removeNewImage(index) {
                    URL.revokeObjectURL(this.newImages[index].url);
                    this.newImages.splice(index, 1);

                    const input = document.getElementById('file-upload');
                    const dt = new DataTransfer();
                    const { files } = input;

                    for (let i = 0; i < files.length; i++) {
                        if (i !== index) dt.items.add(files[i]);
                    }
                    input.files = dt.files;
                },

                removeExistingImage(index) {
                    this.existingImages.splice(index, 1);
                },

                editProduct(product) {
                    this.selectedProduct = JSON.parse(JSON.stringify(product));
                    this.displayPrice = this.formatPrice(this.selectedProduct.harga_asli);
                    this.displayDiscount = this.formatPrice(this.selectedProduct.harga_diskon);
                    this.selectedProduct.smoking = Boolean(this.selectedProduct.smoking);
                    this.selectedProduct.rekomendasi = Boolean(this.selectedProduct.rekomendasi);

                    this.existingImages = this.getImageArray(this.selectedProduct.gambar);

                    this.newImages = [];
                    if(document.getElementById('file-upload')) {
                        document.getElementById('file-upload').value = "";
                    }

                    this.view = "edit";
                    window.scrollTo(0, 0);
                },

                showList() {
                    this.selectedProduct = null;
                    this.existingImages = [];
                    this.newImages = [];
                    if(document.getElementById('file-upload')) {
                        document.getElementById('file-upload').value = "";
                    }
                    this.view = "list";
                },

                addProductForm() {
                    this.selectedProduct = JSON.parse(JSON.stringify(this.newProductTemplate));
                    this.displayPrice = "";
                    this.displayDiscount = "";

                    this.existingImages = [];
                    this.newImages = [];

                    if(document.getElementById('file-upload')) {
                        document.getElementById('file-upload').value = "";
                    }

                    this.view = "edit";
                    window.scrollTo(0, 0);
                }
            };
        }
    </script>
    <script defer src="/js/admin/bundle.js"></script>
</body>
@endsection
