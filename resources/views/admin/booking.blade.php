@extends('layouts/admin')

@section('content')
<body x-data="bookingSystem()" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{ 'dark bg-gray-900': darkMode === true }">
    @include('components/admin/preloader')
    <div class="flex h-screen overflow-hidden">
        @include('components/admin/sidebar')
        <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
            @include('components/admin/overlay')
            @include('components/admin/header')
            <main class="flex-1 bg-gray-50 dark:bg-gray-900">
                <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
                    <div x-data="{ pageName: 'Booking' }">
                        @include('components/admin/breadcrumb')
                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                        <div class="flex items-center gap-4">

                            <div class="relative" x-data="{ isOpen: false }">
                                <button @click="isOpen = !isOpen" @click.away="isOpen = false"
                                    class="flex items-center justify-center gap-2 px-4 py-2 text-sm bg-white border border-gray-300 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L13 10.414V15a1 1 0 01-.293.707l-2 2A1 1 0 019 17v-6.586L4.293 6.707A1 1 0 014 6V3z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Filter By
                                </button>
                                <div x-show="isOpen" x-transition style="display: none;"
                                    class="absolute z-10 w-48 mt-2 bg-white rounded-md shadow-lg dark:bg-gray-800 ring-1 ring-black ring-opacity-5">
                                    <div class="py-1">
                                        <button @click="sortOrder = 'newest'; isOpen = false"
                                            class="block w-full px-4 py-2 text-sm text-left text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                            Terbaru
                                        </button>
                                        <button @click="sortOrder = 'oldest'; isOpen = false"
                                            class="block w-full px-4 py-2 text-sm text-left text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                            Terlama
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="relative" x-data="{ isOpen: false }">
                                <button @click="isOpen = !isOpen" @click.away="isOpen = false"
                                    class="flex items-center justify-center gap-2 px-4 py-2 text-sm bg-white border border-gray-300 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700">
                                    Date
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div x-show="isOpen" x-transition style="display: none;"
                                    class="absolute z-10 w-48 mt-2 bg-white rounded-md shadow-lg dark:bg-gray-800 ring-1 ring-black ring-opacity-5">
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Hari
                                        Ini</a>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">7
                                        Hari Terakhir</a>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Bulan
                                        Ini</a>
                                </div>
                            </div>

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

                    <div
                        class="mb-6 grid grid-cols-2 md:grid-cols-4 gap-2.5 p-1.5 bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                        <button @click="activeTab = 'pending'"
                            :class="activeTab === 'pending' ? 'bg-gray-900 text-white dark:bg-gray-700' :
                                'text-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700/50'"
                            class="px-4 py-3 font-medium text-sm rounded-md transition-all duration-200">
                            Menunggu diverifikasi
                        </button>
                        <button @click="activeTab = 'booked'"
                            :class="activeTab === 'booked' ? 'bg-gray-900 text-white dark:bg-gray-700' :
                                'text-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700/50'"
                            class="px-4 py-3 font-medium text-sm rounded-md transition-all duration-200">
                            Booked
                        </button>
                        <button @click="activeTab = 'checkin'"
                            :class="activeTab === 'checkin' ? 'bg-gray-900 text-white dark:bg-gray-700' :
                                'text-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700/50'"
                            class="px-4 py-3 font-medium text-sm rounded-md transition-all duration-200">
                            Check In
                        </button>
                        <button @click="activeTab = 'checkout'"
                            :class="activeTab === 'checkout' ? 'bg-gray-900 text-white dark:bg-gray-700' :
                                'text-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700/50'"
                            class="px-4 py-3 font-medium text-sm rounded-md transition-all duration-200">
                            Riwayat
                        </button>
                    </div>

                    <div
                        class="w-full overflow-x-auto bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700">
                        <table class="w-full text-left table-fixed">
                            <thead class="border-b border-gray-200 dark:border-gray-700">
                                <tr class="text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                    <th class="px-6 py-4 w-[10%]">ID</th>
                                    <th class="px-6 py-4 w-[20%]">Nama</th>
                                    <th class="px-6 py-4 w-[15%]">No Ponsel</th>
                                    <th class="px-6 py-4 w-[15%]">
                                        <span
                                            x-text="activeTab === 'pending' || activeTab === 'checkout' ? 'Tgl. Booking' : 'Tgl. Check In'"></span>
                                    </th>
                                    <th class="px-6 py-4 w-[20%]">Kamar</th>
                                    <th class="px-6 py-4 w-[5%] text-center">Qty</th>
                                    <th class="px-6 py-4 w-[15%] text-center">Aksi / Status</th>
                                </tr>
                            </thead>

                            <tbody
                                class="text-sm text-gray-700 dark:text-gray-300 divide-y divide-gray-200 dark:divide-gray-700">
                                <template x-for="booking in filteredBookings" :key="booking.id">
                                    <tr>
                                        <td class="px-6 py-4 font-medium break-words" x-text="booking.id"></td>
                                        <td class="px-6 py-4 break-words" x-text="booking.name"></td>
                                        <td class="px-6 py-4 break-words" x-text="booking.phone"></td>
                                        <td class="px-6 py-4 break-words" x-text="booking.date"></td>
                                        <td class="px-6 py-4 break-words" x-text="booking.room"></td>
                                        <td class="px-6 py-4 text-center" x-text="booking.qty"></td>

                                        <td class="px-6 py-4 text-center">

                                            <template x-if="booking.status === 'pending'">
                                                <span
                                                    class="px-2.5 py-1 text-xs font-medium text-red-700 bg-red-100 rounded-full dark:bg-red-900/20 dark:text-red-400">
                                                    Pending
                                                </span>
                                            </template>

                                            <template x-if="booking.status === 'booked'">
                                                <button @click="openModal(booking.id, 'checkin')"
                                                    class="flex items-center justify-center w-8 h-8 rounded-full bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 hover:bg-green-200 mx-auto"
                                                    title="Check In Tamu">
                                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </template>

                                            <template x-if="booking.status === 'checkin'">
                                                <button @click="openModal(booking.id, 'checkout')"
                                                    class="flex items-center justify-center w-8 h-8 rounded-full bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 hover:bg-green-200 mx-auto"
                                                    title="Check Out Tamu">
                                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </template>

                                            <template x-if="booking.status === 'checkout'">
                                                <span
                                                    class="px-2.5 py-1 text-xs font-medium text-blue-700 bg-blue-100 rounded-full dark:bg-blue-900/20 dark:text-blue-400">
                                                    Check Out
                                                </span>
                                            </template>

                                        </td>
                                    </tr>
                                </template>

                                <template x-if="filteredBookings.length === 0">
                                    <tr>
                                        <td colspan="7"
                                            class="px-6 py-10 text-center text-gray-500 dark:text-gray-400">
                                            Tidak ada data untuk ditampilkan.
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>

            <div x-show="isModalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="absolute inset-0 z-50 flex items-center justify-center p-4 pointer-events-none"
                style="display: none;">
                <div @click.away="cancelUpdate()" x-show="isModalOpen" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-90"
                    class="bg-white dark:bg-gray-800 rounded-lg shadow-xl w-full max-w-sm p-6 pointer-events-auto">
                    <h3 class="text-lg font-medium text-center text-gray-900 dark:text-white mb-6"
                        x-text="modalMessage">
                    </h3>
                    <div class="flex justify-center space-x-4">
                        <button @click="cancelUpdate()"
                            class="py-2.5 px-8 rounded-md font-medium text-white bg-red-600 hover:bg-red-700 transition-colors">
                            Batal
                        </button>
                        <button @click="confirmUpdate()"
                            class="py-2.5 px-8 rounded-md font-medium bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                            Ya
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function bookingSystem() {
            return {
                // State dasar
                page: 'booking',
                loaded: true,
                darkMode: false,
                stickyMenu: false,
                sidebarToggle: false,
                scrollTop: false,

                // State Fungsional
                activeTab: 'pending',
                sortOrder: 'default', // <-- [MODIFIKASI] Menambahkan state sortOrder
                isModalOpen: false,
                modalMessage: '',
                bookingToUpdate: {
                    id: null,
                    newStatus: ''
                },

                // Data Master Booking
                bookings: [{
                        id: '00001',
                        name: 'Christine Brooks',
                        phone: '081327392912',
                        date: '14 Feb 2025',
                        room: 'Family Room (tipe sungai & dapur)',
                        qty: 1,
                        status: 'pending'
                    },
                    {
                        id: '00002',
                        name: 'Rosie Pearson',
                        phone: '087825348001',
                        date: '14 Feb 2025',
                        room: 'Family Room (tipe sungai)',
                        qty: 1,
                        status: 'pending'
                    },
                    {
                        id: '00003',
                        name: 'Darrell Caldwell',
                        phone: '085412091737',
                        date: '15 Feb 2025',
                        room: 'Family Room (tipe gunung)',
                        qty: 1,
                        status: 'booked'
                    },
                    {
                        id: '00004',
                        name: 'Gilbert Johnston',
                        phone: '085417879002',
                        date: '15 Feb 2025',
                        room: 'Twin Bed',
                        qty: 1,
                        status: 'checkin'
                    },
                    {
                        id: '00005',
                        name: 'Alan Cain',
                        phone: '087820041289',
                        date: '10 Feb 2025',
                        room: 'Queen Bed',
                        qty: 1,
                        status: 'checkout'
                    },
                    {
                        id: '00006',
                        name: 'Alfredo Simanjuntak',
                        phone: '081234567890',
                        date: '16 Feb 2025',
                        room: 'Queen Bed',
                        qty: 1,
                        status: 'booked'
                    }
                ],

                // Getter untuk memfilter data secara dinamis
                get filteredBookings() {
                    // [MODIFIKASI] Menambahkan logika sorting berdasarkan sortOrder
                    const filtered = this.bookings.filter(b => b.status === this.activeTab);

                    // Helper untuk parse tanggal '14 Feb 2025'
                    const parseDate = (dateStr) => new Date(dateStr);

                    if (this.sortOrder === 'newest') {
                        // Terbaru (Descending)
                        return [...filtered].sort((a, b) => parseDate(b.date) - parseDate(a.date));
                    }
                    if (this.sortOrder === 'oldest') {
                        // Terlama (Ascending)
                        return [...filtered].sort((a, b) => parseDate(a.date) - parseDate(b.date));
                    }

                    // Urutan default (tanpa sort)
                    return filtered;
                },

                // 1. Buka Modal dan siapkan data
                openModal(id, newStatus) {
                    let actionText = '';
                    if (newStatus === 'checkin') {
                        actionText = 'menjadi check in';
                    } else if (newStatus === 'checkout') {
                        actionText = 'menjadi check out';
                    }

                    this.modalMessage = `Apakah Anda yakin ingin mengubah status ${actionText}?`;
                    this.bookingToUpdate = {
                        id,
                        newStatus
                    };
                    this.isModalOpen = true;
                },

                // 2. Konfirmasi (tombol "Ya")
                confirmUpdate() {
                    const {
                        id,
                        newStatus
                    } = this.bookingToUpdate;
                    const booking = this.bookings.find(b => b.id === id);

                    if (booking) {
                        booking.status = newStatus;
                    }

                    this.cancelUpdate(); // Tutup modal & reset
                },

                // 3. Batal (tombol "Batal" atau klik luar)
                cancelUpdate() {
                    this.isModalOpen = false;
                    this.modalMessage = '';
                    this.bookingToUpdate = {
                        id: null,
                        newStatus: ''
                    };
                }
            };
        }
    </script>
    <script defer src="/js/admin/bundle.js"></script>
</body>
@endsection
