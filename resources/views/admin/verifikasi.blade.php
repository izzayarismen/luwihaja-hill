@extends('layouts/admin')

@section('content')
<body x-data="{
    page: 'formElements',
    'loaded': true,
    'darkMode': false,
    'stickyMenu': false,
    'sidebarToggle': false,
    'scrollTop': false,

    isFilterOpen: false,
    sortOrder: 'default',

    hasItems: true,
    isDetailView: false,
    isApproveModalOpen: false,
    isRejectModalOpen: false,
    selectedItem: null,

    items: [{
            id: '00001',
            nama: 'Christine Brooks',
            kamar: 'Family Room',
            jenis: 'Tipe Sungai & Dapur',
            jumlah: 1,
            checkIn: '14 Feb 2025',
            checkOut: '15 Feb 2025',
            tglBooking: '10 Feb 2025',
            totalHarga: 'Rp 1.500.000',
            image: './images/product/product-01.jpg'
        },
        {
            id: '00002',
            nama: 'John Doe',
            kamar: 'Deluxe Room',
            jenis: 'Tipe Laut',
            jumlah: 2,
            checkIn: '20 Mar 2025',
            checkOut: '22 Mar 2025',
            tglBooking: '15 Mar 2025',
            totalHarga: 'Rp 2.800.000',
            image: './images/product/product-02.jpg'
        },
        {
            id: '00003',
            nama: 'Jane Smith',
            kamar: 'Standard Room',
            jenis: 'Tipe Gunung',
            jumlah: 1,
            checkIn: '01 Apr 2025',
            checkOut: '03 Apr 2025',
            tglBooking: '28 Mar 2025',
            totalHarga: 'Rp 1.200.000',
            image: './images/product/product-03.jpg'
        },
        {
            id: '00004',
            nama: 'Robert Green',
            kamar: 'Suite Room',
            jenis: 'Tipe Kota',
            jumlah: 1,
            checkIn: '10 May 2025',
            checkOut: '12 May 2025',
            tglBooking: '05 May 2025',
            totalHarga: 'Rp 3.500.000',
            image: './images/product/product-04.jpg'
        }
    ],

    showDetail: function(item) {
        this.selectedItem = item;
        this.isDetailView = true;
    },

    sortedItems() {
        // Helper untuk parse tanggal '10 Feb 2025'
        const parseDate = (dateStr) => new Date(dateStr);

        if (this.sortOrder === 'newest') {
            // Terbaru (Descending)
            return [...this.items].sort((a, b) => parseDate(b.tglBooking) - parseDate(a.tglBooking));
        }
        if (this.sortOrder === 'oldest') {
            // Terlama (Ascending)
            return [...this.items].sort((a, b) => parseDate(a.tglBooking) - parseDate(b.tglBooking));
        }
        // Urutan default
        return this.items;
    }
}" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{ 'dark bg-gray-900': darkMode === true }">
    @include('components/admin/preloader')
    <div class="flex h-screen overflow-hidden">
        @include('components/admin/sidebar')
        <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
            @include('components/admin/overlay')
            @include('components/admin/header')
            <main class="flex-1 bg-gray-50 dark:bg-gray-900">
                <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
                    <template x-if="!isDetailView">
                        <div>
                            <div x-data="{ pageName: 'Verifikasi' }">
                                @include('components/admin/breadcrumb')
                            </div>
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                                <div class="flex items-center gap-4">
                                    <div class="relative">
                                        <button @click="isFilterOpen = !isFilterOpen"
                                            class="flex items-center justify-center gap-2 px-4 py-2 text-sm bg-white border border-gray-300 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700">
                                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L13 10.414V15a1 1 0 01-.293.707l-2 2A1 1 0 019 17v-6.586L4.293 6.707A1 1 0 014 6V3z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Filter By
                                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>

                                        <div @click.away="isFilterOpen = false" x-show="isFilterOpen"
                                            x-transition:enter="transition ease-out duration-100"
                                            x-transition:enter-start="opacity-0 scale-95"
                                            x-transition:enter-end="opacity-100 scale-100"
                                            x-transition:leave="transition ease-in duration-75"
                                            x-transition:leave-start="opacity-100 scale-100"
                                            x-transition:leave-end="opacity-0 scale-95"
                                            class="absolute z-10 w-40 mt-2 origin-top-left bg-white rounded-lg shadow-lg dark:bg-gray-800 border dark:border-gray-700"
                                            style="display: none;">
                                            <div class="py-1">
                                                <button @click="sortOrder = 'newest'; isFilterOpen = false"
                                                    class="w-full px-4 py-2 text-sm text-left text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                                    Terbaru
                                                </button>
                                                <button @click="sortOrder = 'oldest'; isFilterOpen = false"
                                                    class="w-full px-4 py-2 text-sm text-left text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                                    Terlama
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <button
                                        class="flex items-center justify-center gap-2 px-4 py-2 text-sm bg-white border border-gray-300 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700">
                                        Date
                                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                                <button @click="sortOrder = 'default'"
                                    class="flex items-center gap-2 px-4 py-2 text-sm text-red-600 bg-white border border-red-300 rounded-lg shadow-sm dark:bg-red-900/20 dark:border-red-800 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/30">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M4 2a1 1 0 011 1v0.1a7 7 0 0110.1 3.2A1 1 0 0114.2 7 5 5 0 008.2 9a1 1 0 11-1.4 1.4A7 7 0 014 3.1V4a1 1 0 11-2 0V2a1 1 0 011-1zm14 14a1 1 0 01-1 1v.1a7 7 0 01-10.1-3.2A1 1 0 016.8 13a5 5 0 005.1-2 1 1 0 111.4-1.4A7 7 0 0116 16.9V16a1 1 0 112 0v2a1 1 0 01-1 1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Reset Filter
                                </button>
                            </div>
                            <template x-if="!hasItems">
                                <div class="flex items-center justify-center min-h-[60vh] text-center">
                                    <h2 class="text-xl font-medium text-gray-500 dark:text-gray-400">
                                        Verifikasi pembayaran belum tersedia.
                                    </h2>
                                </div>
                            </template>

                            <template x-if="hasItems">
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                                    <template x-for="item in sortedItems()" :key="item.id">
                                        <div
                                            class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm overflow-hidden border border-gray-200 dark:border-gray-700">
                                            <img :src="item.image" :alt="item.kamar"
                                                class="w-full h-48 object-cover" />
                                            <div class="p-4">
                                                <button @click="showDetail(item)"
                                                    class="w-full px-4 py-3 font-medium text-gray-700 bg-gray-100 rounded-lg dark:bg-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                                                    LIHAT DETAIL
                                                </button>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </template>
                        </div>
                    </template>

                    <template x-if="isDetailView">
                        <div class="w-full flex justify-center py-10">
                            <div
                                class="w-full max-w-4xl bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden grid grid-cols-1 sm:grid-cols-2 border border-gray-200 dark:border-gray-700">
                                <div class="hidden sm:block">
                                    <img :src="selectedItem ? selectedItem.image : ''" alt="Detail Kamar"
                                        class="w-full h-full object-cover" />
                                </div>

                                <div class="p-6 flex flex-col">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                                        DETAIL TRANSAKSI
                                    </h3>

                                    <div class="flex-1 overflow-y-auto">
                                        <table class="w-full text-sm">
                                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                                <tr class="divide-x divide-gray-200 dark:divide-gray-700">
                                                    <td
                                                        class="px-4 py-3 w-1/3 font-medium text-gray-500 dark:text-gray-400">
                                                        ORDER ID
                                                    </td>
                                                    <td class="px-4 py-3 w-2/3 text-gray-800 dark:text-gray-200"
                                                        x-text="selectedItem ? selectedItem.id : ''"></td>
                                                </tr>
                                                <tr class="divide-x divide-gray-200 dark:divide-gray-700">
                                                    <td
                                                        class="px-4 py-3 w-1/3 font-medium text-gray-500 dark:text-gray-400">
                                                        NAMA
                                                    </td>
                                                    <td class="px-4 py-3 w-2/3 text-gray-800 dark:text-gray-200"
                                                        x-text="selectedItem ? selectedItem.nama : ''"></td>
                                                </tr>
                                                <tr class="divide-x divide-gray-200 dark:divide-gray-700">
                                                    <td
                                                        class="px-4 py-3 w-1/3 font-medium text-gray-500 dark:text-gray-400">
                                                        KAMAR
                                                    </td>
                                                    <td class="px-4 py-3 w-2/3 text-gray-800 dark:text-gray-200"
                                                        x-text="selectedItem ? selectedItem.kamar : ''"></td>
                                                </tr>
                                                <tr class="divide-x divide-gray-200 dark:divide-gray-700">
                                                    <td
                                                        class="px-4 py-3 w-1/3 font-medium text-gray-500 dark:text-gray-400">
                                                        JENIS
                                                    </td>
                                                    <td class="px-4 py-3 w-2/3 text-gray-800 dark:text-gray-200"
                                                        x-text="selectedItem ? selectedItem.jenis : ''"></td>
                                                </tr>
                                                <tr class="divide-x divide-gray-200 dark:divide-gray-700">
                                                    <td
                                                        class="px-4 py-3 w-1/3 font-medium text-gray-500 dark:text-gray-400">
                                                        JUMLAH
                                                    </td>
                                                    <td class="px-4 py-3 w-2/3 text-gray-800 dark:text-gray-200"
                                                        x-text="selectedItem ? selectedItem.jumlah : ''"></td>
                                                </tr>
                                                <tr class="divide-x divide-gray-200 dark:divide-gray-700">
                                                    <td
                                                        class="px-4 py-3 w-1/3 font-medium text-gray-500 dark:text-gray-400">
                                                        CHECK IN
                                                    </td>
                                                    <td class="px-4 py-3 w-2/3 text-gray-800 dark:text-gray-200"
                                                        x-text="selectedItem ? selectedItem.checkIn : ''"></td>
                                                </tr>
                                                <tr class="divide-x divide-gray-200 dark:divide-gray-700">
                                                    <td
                                                        class="px-4 py-3 w-1/3 font-medium text-gray-500 dark:text-gray-400">
                                                        CHECK OUT
                                                    </td>
                                                    <td class="px-4 py-3 w-2/3 text-gray-800 dark:text-gray-200"
                                                        x-text="selectedItem ? selectedItem.checkOut : ''"></td>
                                                </tr>
                                                <tr class="divide-x divide-gray-200 dark:divide-gray-700">
                                                    <td
                                                        class="px-4 py-3 w-1/3 font-medium text-gray-500 dark:text-gray-400">
                                                        TANGGAL BOOKING
                                                    </td>
                                                    <td class="px-4 py-3 w-2/3 text-gray-800 dark:text-gray-200"
                                                        x-text="selectedItem ? selectedItem.tglBooking : ''"></td>
                                                </tr>
                                                <tr class="divide-x divide-gray-200 dark:divide-gray-700">
                                                    <td
                                                        class="px-4 py-3 w-1/3 font-medium text-gray-500 dark:text-gray-400">
                                                        TOTAL HARGA
                                                    </td>
                                                    <td class="px-4 py-3 w-2/3 font-semibold text-gray-900 dark:text-white"
                                                        x-text="selectedItem ? selectedItem.totalHarga : ''"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div
                                        class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700 flex items-center justify-between">
                                        <button @click="isDetailView = false"
                                            class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg dark:bg-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600">
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H15a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Kembali
                                        </button>
                                        <div class="flex items-center gap-3">
                                            <button @click="isRejectModalOpen = true"
                                                class="flex items-center justify-center w-10 h-10 bg-red-100 rounded-lg dark:bg-red-900/30 hover:bg-red-200 dark:hover:bg-red-900/50">
                                                <svg class="w-5 h-5 text-red-600 dark:text-red-400"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                            <button @click="isApproveModalOpen = true"
                                                class="flex items-center justify-center w-10 h-10 bg-green-100 rounded-lg dark:bg-green-900/30 hover:bg-green-200 dark:hover:bg-green-900/50">
                                                <svg class="w-5 h-5 text-green-600 dark:text-green-400"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </main>
            <div x-show="isApproveModalOpen" x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                class="absolute inset-0 z-50 flex items-center justify-center p-4" style="display: none">
                <div @click.away="isApproveModalOpen = false"
                    class="w-full max-w-sm p-6 text-center bg-white dark:bg-gray-800 rounded-2xl shadow-xl">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                        Apakah Anda ingin mem-verifikasi pembayaran ini?
                    </h3>
                    <div class="grid grid-cols-2 gap-4 mt-6">
                        <button @click="isApproveModalOpen = false"
                            class="px-4 py-2.5 font-medium text-white bg-red-600 rounded-lg hover:bg-red-700">
                            Batal
                        </button>
                        <button @click="isApproveModalOpen = false"
                            class="px-4 py-2.5 font-medium text-gray-800 bg-gray-100 rounded-lg hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                            Ya
                        </button>
                    </div>
                </div>
            </div>
            <div x-show="isRejectModalOpen" x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                class="absolute inset-0 z-50 flex items-center justify-center p-4" style="display: none">
                <div @click.away="isRejectModalOpen = false"
                    class="w-full max-w-sm p-6 bg-white dark:bg-gray-800 rounded-2xl shadow-xl">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                        Masukkan alasan Anda menolak pembayaran ini
                    </h3>
                    <textarea rows="4" placeholder="Tulis alasan..."
                        class="w-full p-3 mt-4 text-sm bg-gray-50 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500"></textarea>
                    <div class="grid grid-cols-2 gap-4 mt-6">
                        <button @click="isRejectModalOpen = false"
                            class="px-4 py-2.5 font-medium text-white bg-red-600 rounded-lg hover:bg-red-700">
                            Batal
                        </button>
                        <button @click="isRejectModalOpen = false"
                            class="px-4 py-2.5 font-medium text-gray-800 bg-gray-100 rounded-lg hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                            Tolak dan Kirim
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script defer src="/js/admin/bundle.js"></script>
</body>
@endsection
