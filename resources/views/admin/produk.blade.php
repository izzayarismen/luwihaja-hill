@extends('layouts/admin')

@section('content')
<body x-data="productPageData()" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{ 'dark bg-gray-900': darkMode === true }">
    @include('components/admin/preloader')
    <div class="flex h-screen overflow-hidden">
        @include('components/admin/sidebar')
        <div class="relative flex flex-1 flex-col overflow-x-hidden overflow-y-auto">
            @include('components/admin/overlay')
            @include('components/admin/header')
            <main class="flex-1 bg-gray-50 dark:bg-gray-900">
                <div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6">
                    <div x-show="view === 'list'" x-transition>
                        <div x-data="{ pageName: 'Produk' }">
                            @include('components/admin/breadcrumb')
                        </div>

                        <div
                            class="mt-6 overflow-x-auto rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-800 dark:bg-gray-800">
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
                                    class="divide-y divide-gray-200 text-sm text-gray-700 dark:divide-gray-700 dark:text-gray-300">
                                    <template x-for="product in products" :key="product.id">
                                        <tr>
                                            <td class="px-6 py-4">
                                                <img :src="product.img" alt="Kamar"
                                                    class="h-10 w-10 rounded-md object-cover" />
                                            </td>
                                            <td class="px-6 py-4 font-medium" x-text="product.name"></td>
                                            <td class="px-6 py-4" x-text="product.category"></td>
                                            <td class="px-6 py-4" x-text="`Rp ${formatPrice(product.price)}`"></td>
                                            <td class="px-6 py-4" x-text="product.stock"></td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-3">
                                                    <button @click="editProduct(product)"
                                                        class="text-gray-500 hover:text-blue-500 dark:text-gray-400 dark:hover:text-blue-400">
                                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path
                                                                d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                            <path fill-rule="evenodd"
                                                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                    <button
                                                        @click="productToDeleteId = product.id; isDeleteModalOpen = true"
                                                        class="text-gray-500 hover:text-red-500 dark:text-gray-400 dark:hover:text-red-400">
                                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 20 20" fill="currentColor">
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
                    </div>

                    <template x-if="view === 'edit'">
                        <div x-transition>
                            <div x-data="{ pageName: selectedProduct.id ? 'Edit Produk' : 'Tambah Produk' }">
                                <include src="./partials/breadcrumb.html" />
                            </div>

                            <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-3">
                                <div class="lg:col-span-2">
                                    <div
                                        class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                                        <div x-data="{
                                            mainImage: selectedProduct.images[0] || './images/product/product-placeholder.png',
                                            activeIndex: 0,
                                            next() {
                                                if (selectedProduct.images.length === 0) return;
                                                this.activeIndex = (this.activeIndex + 1) % selectedProduct.images.length;
                                                this.mainImage = selectedProduct.images[this.activeIndex];
                                            },
                                            prev() {
                                                if (selectedProduct.images.length === 0) return;
                                                this.activeIndex = (this.activeIndex - 1 + selectedProduct.images.length) % selectedProduct.images.length;
                                                this.mainImage = selectedProduct.images[this.activeIndex];
                                            }
                                        }">
                                            <div
                                                class="relative overflow-hidden rounded-lg bg-gray-100 dark:bg-gray-700">
                                                <img :src="mainImage" alt="Family Room"
                                                    class="aspect-video h-auto w-full object-cover transition-all duration-300" />
                                                <button @click="prev()"
                                                    class="absolute top-1/2 left-4 z-10 -translate-y-1/2 rounded-full bg-white/70 p-2 transition-colors hover:bg-white">
                                                    <svg class="h-5 w-5 text-gray-800" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                                    </svg>
                                                </button>
                                                <button @click="next()"
                                                    class="absolute top-1/2 right-4 z-10 -translate-y-1/2 rounded-full bg-white/70 p-2 transition-colors hover:bg-white">
                                                    <svg class="h-5 w-5 text-gray-800" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="mt-4 grid grid-cols-5 gap-2">
                                                <template x-for="(image, index) in selectedProduct.images"
                                                    :key="index">
                                                    <button @click="mainImage = image; activeIndex = index"
                                                        :class="activeIndex === index ?
                                                            'ring-2 ring-offset-2 ring-gray-700 dark:ring-blue-500' :
                                                            'ring-1 ring-gray-200 dark:ring-gray-700'"
                                                        class="overflow-hidden rounded-md transition-all">
                                                        <img :src="image" alt="Thumbnail"
                                                            class="aspect-square h-auto w-full object-cover" />
                                                    </button>
                                                </template>
                                            </div>
                                        </div>

                                        <div class="mt-6">
                                            <h4 class="text-md mb-2 font-medium text-gray-800 dark:text-white">
                                                Upload Gambar Baru
                                            </h4>
                                            <label for="file-upload"
                                                class="flex h-32 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 transition hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600">
                                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg class="mb-2 h-8 w-8 text-gray-500 dark:text-gray-400"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 20 16">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L7 9m3-3 3 3" />
                                                    </svg>
                                                    <p class="mb-1 text-sm text-gray-500 dark:text-gray-400">
                                                        <span class="font-semibold">Klik untuk upload</span>
                                                        atau tarik dan lepas
                                                    </p>
                                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                                        PNG, JPG, atau GIF (MAX. 800x400px)
                                                    </p>
                                                </div>
                                                <input id="file-upload" type="file" class="hidden"
                                                    @change="handleFiles($event)" multiple />
                                            </label>

                                            <div x-show="newImages.length > 0" class="mt-4">
                                                <h5 class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                                    Gambar yang akan di-upload:
                                                </h5>
                                                <div class="mt-2 grid grid-cols-3 gap-4 sm:grid-cols-4 md:grid-cols-6">
                                                    <template x-for="(img, index) in newImages" :key="index">
                                                        <div class="relative">
                                                            <img :src="img.url"
                                                                class="h-24 w-full rounded-md border border-gray-200 object-cover dark:border-gray-600" />
                                                            <button @click="removeNewImage(index)"
                                                                class="absolute -top-2 -right-2 flex h-6 w-6 items-center justify-center rounded-full bg-red-600 text-sm font-bold text-white shadow-md">
                                                                &times;
                                                            </button>
                                                            <p class="truncate text-xs text-gray-600 dark:text-gray-400"
                                                                x-text="img.name"></p>
                                                        </div>
                                                    </template>
                                                </div>
                                            </div>
                                        </div>
                                        <div x-data="{ activeTab: 'umum' }" class="mt-8">
                                            <div class="border-b border-gray-200 dark:border-gray-700">
                                                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                                                    <button @click="activeTab = 'umum'"
                                                        :class="activeTab === 'umum' ?
                                                            'border-gray-700 dark:border-blue-500 text-gray-800 dark:text-white' :
                                                            'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:hover:text-gray-300'"
                                                        class="border-b-2 px-1 py-4 text-sm font-medium transition-colors">
                                                        Gambaran Umum
                                                    </button>
                                                    <button @click="activeTab = 'ulasan'"
                                                        :class="activeTab === 'ulasan' ?
                                                            'border-gray-700 dark:border-blue-500 text-gray-800 dark:text-white' :
                                                            'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:hover:text-gray-300'"
                                                        class="border-b-2 px-1 py-4 text-sm font-medium transition-colors">
                                                        Ulasan
                                                    </button>
                                                </nav>
                                            </div>
                                            <div class="py-6">
                                                <div x-show="activeTab === 'umum'" x-transition>
                                                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white">
                                                        Deskripsi Kamar
                                                    </h3>
                                                    <textarea x-model="selectedProduct.description" rows="5" placeholder="Masukkan deskripsi kamar di sini..."
                                                        class="mt-4 w-full rounded-md border border-gray-300 bg-white p-2 leading-relaxed text-gray-600 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400"></textarea>
                                                </div>
                                                <div x-show="activeTab === 'ulasan'" x-transition
                                                    style="display: none">
                                                    <p class="text-gray-600 dark:text-gray-400">
                                                        Belum ada ulasan untuk produk ini.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-6 lg:col-span-1">
                                    <div
                                        class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Nama
                                            Kamar</label>
                                        <input type="text" x-model="selectedProduct.name"
                                            class="w-full border-0 bg-transparent p-0 text-2xl font-bold text-gray-800 focus:ring-0 dark:text-white" />

                                        <label
                                            class="mt-2 block text-sm font-medium text-gray-500 dark:text-gray-400">Tipe
                                            Kamar</label>
                                        <input type="text" x-model="selectedProduct.category"
                                            class="w-full border-0 bg-transparent p-0 text-lg text-gray-600 focus:ring-0 dark:text-gray-400" />

                                        <div class="mt-2 flex items-center">
                                            <div class="flex items-center gap-0.5 text-yellow-500">
                                                <template x-for="i in 5">
                                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
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
                                                class="block text-sm font-medium text-gray-500 dark:text-gray-400">Harga
                                                per Malam</label>
                                            <div class="relative">
                                                <span
                                                    class="absolute top-1/2 left-2 -translate-y-1/2 text-3xl font-bold text-gray-800 dark:text-white">Rp
                                                </span>
                                                <input type="text" x-model="displayPrice"
                                                    @input="$el.value = formatPrice($el.value); displayPrice = $el.value"
                                                    class="w-full border-0 bg-transparent p-0 pl-12 text-3xl font-bold text-gray-800 focus:ring-0 dark:text-white" />
                                            </div>
                                            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                                *Harga akhir pekan. Pajak dan biaya lain tidak
                                                termasuk
                                            </p>
                                        </div>
                                    </div>

                                    <div x-data="{ stockActive: selectedProduct.stock > 0 }"
                                        class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                                        <div class="flex items-center justify-between">
                                            <label for="stock"
                                                class="font-medium text-gray-700 dark:text-gray-300">Stok
                                                Tersedia</label>
                                            <button @click="stockActive = !stockActive"
                                                :class="stockActive ? 'bg-green-600' : 'bg-gray-200 dark:bg-gray-600'"
                                                class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none"
                                                role="switch" :aria-checked="stockActive.toString()">
                                                <span :class="stockActive ? 'translate-x-5' : 'translate-x-0'"
                                                    class="inline-block h-5 w-5 transform rounded-full bg-white ring-0 shadow transition duration-200 ease-in-out dark:bg-gray-300"></span>
                                            </button>
                                        </div>
                                        <div class="mt-4 flex items-center justify-between">
                                            <label class="font-medium text-gray-700 dark:text-gray-300">Jumlah
                                                Stok</label>
                                            <div class="flex items-center gap-2">
                                                <button
                                                    @click="selectedProduct.stock = Math.max(0, selectedProduct.stock - 1)"
                                                    class="flex h-8 w-8 items-center justify-center rounded-md border border-gray-300 text-gray-600 transition-colors hover:bg-gray-100 dark:border-gray-600 dark:text-gray-400 dark:hover:bg-gray-700">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M20 12H4"></path>
                                                    </svg>
                                                </button>
                                                <input type="text" x-model.number="selectedProduct.stock"
                                                    class="w-12 border-0 bg-transparent p-0 text-center text-lg font-medium text-gray-800 focus:ring-0 dark:text-white" />
                                                <button @click="selectedProduct.stock++"
                                                    class="flex h-8 w-8 items-center justify-center rounded-md border border-gray-300 text-gray-600 transition-colors hover:bg-gray-100 dark:border-gray-600 dark:text-gray-400 dark:hover:bg-gray-700">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mt-6 grid grid-cols-2 gap-4">
                                            <button @click="showList()"
                                                class="w-full rounded-lg bg-gray-200 px-4 py-3 font-medium text-gray-800 transition-colors hover:bg-gray-300 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                                                Batal
                                            </button>
                                            <button @click="saveProduct()"
                                                class="w-full rounded-lg bg-gray-700 px-4 py-3 font-medium text-white transition-colors hover:bg-gray-800 dark:bg-gray-600 dark:hover:bg-gray-500">
                                                Simpan
                                            </button>
                                        </div>
                                    </div>

                                    <div
                                        class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-lg bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-300">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M17 20h5v-2a3 3 0 00-5.356-2.238M12 6a3 3 0 100-6 3 3 0 000 6zM12 18H3a2 2 0 00-2 2v0h11m0-12a3 3 0 010 6 3 3 0 010-6zM15.3 12.3A5.02 5.02 0 0117 13a5 5 0 015 5v2H2v-2a5 5 0 015-5c.4 0 .8.05 1.18.15">
                                                    </path>
                                                </svg>
                                            </div>
                                            <p class="font-medium text-gray-800 dark:text-white">
                                                Kapasitas Tamu
                                            </p>
                                        </div>

                                        <div class="mt-4 flex items-center justify-between">
                                            <label class="font-medium text-gray-700 dark:text-gray-300">Jumlah
                                                Tamu</label>
                                            <div class="flex items-center gap-2">
                                                <button
                                                    @click="selectedProduct.capacity = Math.max(1, selectedProduct.capacity - 1)"
                                                    class="flex h-8 w-8 items-center justify-center rounded-md border border-gray-300 text-gray-600 transition-colors hover:bg-gray-100 dark:border-gray-600 dark:text-gray-400 dark:hover:bg-gray-700">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M20 12H4"></path>
                                                    </svg>
                                                </button>
                                                <input type="text" x-model.number="selectedProduct.capacity"
                                                    class="w-12 border-0 bg-transparent p-0 text-center text-lg font-medium text-gray-800 focus:ring-0 dark:text-white" />
                                                <button @click="selectedProduct.capacity++"
                                                    class="flex h-8 w-8 items-center justify-center rounded-md border border-gray-300 text-gray-600 transition-colors hover:bg-gray-100 dark:border-gray-600 dark:text-gray-400 dark:hover:bg-gray-700">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>

                    <button x-show="view === 'list'" x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 scale-75" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-200 transform"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-75"
                        @click="addProductForm()"
                        class="fixed right-10 bottom-10 z-30 flex h-14 w-14 items-center justify-center rounded-full bg-gray-800 text-white shadow-lg transition-all hover:bg-gray-900 dark:bg-gray-700 dark:hover:bg-gray-600">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </main>

            <div x-show="isDeleteModalOpen" x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                class="absolute inset-0 z-50 flex items-center justify-center p-4" style="display: none">
                <div @click.away="isDeleteModalOpen = false; productToDeleteId = null"
                    class="w-full max-w-sm rounded-2xl bg-white p-6 text-center shadow-xl dark:bg-gray-800">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                        Apakah Anda yakin ingin menghapus produk ini?
                    </h3>
                    <div class="mt-6 grid grid-cols-2 gap-4">
                        <button @click="isDeleteModalOpen = false; productToDeleteId = null"
                            class="rounded-lg bg-red-600 px-4 py-2.5 font-medium text-white hover:bg-red-700">
                            Batal
                        </button>
                        <button @click="deleteProduct()"
                            class="rounded-lg bg-gray-100 px-4 py-2.5 font-medium text-gray-800 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                            Ya
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function productPageData() {
            return {
                page: "videos",
                loaded: true,
                darkMode: false,
                stickyMenu: false,
                sidebarToggle: false,
                scrollTop: false,
                isDeleteModalOpen: false,
                productToDeleteId: null,

                // State untuk manajemen tampilan
                view: "list", // 'list', 'edit'
                selectedProduct: null, // Menyimpan produk yang dipilih untuk diedit
                newImages: [], // Array untuk pratinjau gambar baru

                // PERUBAHAN: Variabel untuk menyimpan harga yang diformat di input
                displayPrice: "",

                // Data master produk
                // PERUBAHAN: Harga (price) diubah menjadi number, properti capacity ditambahkan
                products: [{
                        id: 1,
                        img: "./images/product/product-01.jpg",
                        name: "Family Room (tipe sungai & dapur)",
                        category: "Family Room",
                        price: 850000,
                        stock: 63,
                        capacity: 4,
                        images: [
                            "./images/product/product-01.jpg",
                            "./images/product/product-05.jpg",
                            "./images/product/product-02.jpg",
                            "./images/product/product-03.jpg",
                            "./images/product/product-04.jpg",
                        ],
                        description: "Dirancang khusus untuk kenyamanan maksimal keluarga, unit Family Room kami adalah pilihan termewah di Villa ini. Dilengkapi dengan dapur pribadi dan pemandangan sungai.",
                    },
                    {
                        id: 2,
                        img: "./images/product/product-02.jpg",
                        name: "Family Room (tipe sungai)",
                        category: "Family Room",
                        price: 190000,
                        stock: 13,
                        capacity: 4,
                        images: [
                            "./images/product/product-02.jpg",
                            "./images/product/product-01.jpg",
                        ],
                        description: "Kamar keluarga dengan pemandangan sungai yang menenangkan.",
                    },
                    {
                        id: 3,
                        img: "./images/product/product-03.jpg",
                        name: "Family Room (tipe gunung)",
                        category: "Family Room",
                        price: 640000,
                        stock: 635,
                        capacity: 4,
                        images: [
                            "./images/product/product-03.jpg",
                            "./images/product/product-01.jpg",
                        ],
                        description: "Kamar keluarga dengan pemandangan gunung yang indah.",
                    },
                    {
                        id: 4,
                        img: "./images/product/product-04.jpg",
                        name: "Twin Bed",
                        category: "Standard",
                        price: 400000,
                        stock: 67,
                        capacity: 2,
                        images: [
                            "./images/product/product-04.jpg",
                            "./images/product/product-01.jpg",
                        ],
                        description: "Kamar standar dengan dua tempat tidur single.",
                    },
                    {
                        id: 5,
                        img: "./images/product/product-01.jpg",
                        name: "Queen Bed",
                        category: "Standard",
                        price: 420000,
                        stock: 52,
                        capacity: 2,
                        images: [
                            "./images/product/product-01.jpg",
                            "./images/product/product-02.jpg",
                        ],
                        description: "Kamar standar dengan satu tempat tidur ukuran queen.",
                    },
                    {
                        id: 6,
                        img: "./images/product/product-02.jpg",
                        name: "Super Deluxe",
                        category: "Deluxe",
                        price: 190000,
                        stock: 13,
                        capacity: 2,
                        images: [
                            "./images/product/product-02.jpg",
                            "./images/product/product-03.jpg",
                        ],
                        description: "Kamar Super Deluxe dengan fasilitas tambahan.",
                    },
                ],

                // Template untuk produk baru
                // PERUBAHAN: Harga diubah jadi number, capacity ditambahkan
                newProductTemplate: {
                    id: null,
                    img: "./images/product/product-placeholder.png", // Gambar default
                    name: "", // Dikosongkan
                    category: "", // Dikosongkan
                    price: 0,
                    stock: 0,
                    capacity: 2, // Default kapasitas
                    images: [], // Dikosongkan
                    description: "", // Dikosongkan
                },

                // --- Fungsi Logika ---

                // PERUBAHAN: Fungsi baru untuk format harga
                formatPrice(value) {
                    if (!value) return "0";
                    // Bersihkan string dari non-angka
                    let numberString = String(value).replace(/[^0-9]/g, "");
                    if (numberString === "") return "0";
                    // Tambahkan titik sebagai pemisah ribuan
                    return numberString.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                },

                // Fungsi untuk menangani file upload
                handleFiles(event) {
                    let files = Array.from(event.target.files);
                    for (let file of files) {
                        this.newImages.push({
                            url: URL.createObjectURL(file),
                            name: file.name,
                        });
                    }
                    // Kosongkan input file agar bisa memilih file yang sama lagi
                    event.target.value = null;
                },

                // Fungsi untuk menghapus pratinjau gambar
                removeNewImage(index) {
                    URL.revokeObjectURL(this.newImages[index].url); // Bebaskan memori
                    this.newImages.splice(index, 1);
                },

                // Fungsi untuk pindah ke mode edit
                editProduct(product) {
                    this.selectedProduct = JSON.parse(JSON.stringify(product));
                    // PERUBAHAN: Set displayPrice saat edit
                    this.displayPrice = this.formatPrice(this.selectedProduct.price);
                    this.newImages = []; // Bersihkan pratinjau
                    this.view = "edit";
                    window.scrollTo(0, 0);
                },

                // Fungsi untuk kembali ke daftar
                showList() {
                    this.selectedProduct = null;
                    this.newImages = []; // Bersihkan pratinjau
                    this.displayPrice = ""; // Bersihkan displayPrice
                    this.view = "list";
                },

                // Fungsi untuk menampilkan form tambah
                addProductForm() {
                    this.selectedProduct = JSON.parse(
                        JSON.stringify(this.newProductTemplate),
                    );
                    // PERUBAHAN: Set displayPrice saat tambah baru
                    this.displayPrice = this.formatPrice(this.selectedProduct.price);
                    this.newImages = []; // Bersihkan pratinjau
                    this.view = "edit";
                    window.scrollTo(0, 0);
                },

                // Fungsi untuk menyimpan produk (simulasi)
                saveProduct() {
                    // PERUBAHAN: Konversi displayPrice kembali ke number
                    this.selectedProduct.price = Number(
                        String(this.displayPrice).replace(/[^0-9]/g, ""),
                    );

                    // 1. Tambahkan gambar baru (dari pratinjau) ke data produk
                    const uploadedImageUrls = this.newImages.map((img) => img.url);
                    this.selectedProduct.images.push(...uploadedImageUrls);

                    // 2. Set gambar utama (thumbnail) jika belum ada
                    if (
                        !this.selectedProduct.img &&
                        this.selectedProduct.images.length > 0
                    ) {
                        this.selectedProduct.img = this.selectedProduct.images[0];
                    } else if (!this.selectedProduct.img) {
                        // Jika masih belum ada gambar, set ke placeholder
                        this.selectedProduct.img =
                            "./images/product/product-placeholder.png";
                    }

                    if (this.selectedProduct.id) {
                        // Mode Edit
                        const index = this.products.findIndex(
                            (p) => p.id === this.selectedProduct.id,
                        );
                        if (index > -1) {
                            this.products[index] = JSON.parse(
                                JSON.stringify(this.selectedProduct),
                            );
                        }
                    } else {
                        // Mode Tambah
                        this.selectedProduct.id = Date.now(); // Buat ID unik baru
                        this.products.push(
                            JSON.parse(JSON.stringify(this.selectedProduct)),
                        );
                    }

                    console.log("Produk Disimpan:", this.selectedProduct);
                    this.showList(); // Kembali ke daftar produk
                },

                deleteProduct() {
                    if (this.productToDeleteId) {
                        this.products = this.products.filter(
                            (p) => p.id !== this.productToDeleteId,
                        );
                        console.log("Produk Dihapus:", this.productToDeleteId);
                        this.productToDeleteId = null;
                        this.isDeleteModalOpen = false;
                    }
                },
            };
        }
    </script>
    <script defer src="/js/admin/bundle.js"></script>
</body>
@endsection
