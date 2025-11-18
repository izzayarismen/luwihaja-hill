@extends('layouts/admin')

@section('content')

    <body x-data="{ page: 'blank', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
    $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{ 'dark bg-gray-900': darkMode === true }">
        @include('components/admin/preloader')
        <div class="flex h-screen overflow-hidden">
            @include('components/admin/sidebar')

            <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden" x-ref="mainContent">
                @include('components/admin/overlay')
                @include('components/admin/header')
                <main>
                    <div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6">
                        <div x-data="{ pageName: 'FAQ & Ulasan' }">
                            @include('components/admin/breadcrumb')
                        </div>

                        <div x-data="{
                            activeTab: 'faq',
                            // --- State FAQ (seperti faqs, showAddForm, dll) DIHAPUS ---

                            // --- Data & State Ulasan (TETAP ADA) ---
                            activeReviewFilter: 'all', // 'all', 5, 4, 3, 2, 1
                            showReviewDeleteModal: false,
                            reviewToDelete: null,
                            reviews: [
                                { id: 1, name: 'Christine Brooks', avatar: './images/user/user-01.png', roomType: 'Family Room (tipe sungai & dapur)', date: '14 Feb 2025', rating: 5, comment: 'menarik' },
                                { id: 2, name: 'Rosie Pearson', avatar: './images/user/user-02.png', roomType: 'Family Room (tipe sungai)', date: '14 Feb 2025', rating: 5, comment: 'puas' },
                                { id: 3, name: 'Darrell Caldwell', avatar: './images/user/user-03.png', roomType: 'Family Room (tipe gunung)', date: '14 Feb 2025', rating: 4, comment: 'pemandangannya bagus' },
                                { id: 4, name: 'Gilbert Johnston', avatar: './images/user/user-04.png', roomType: 'Twin Bed', date: '14 Feb 2025', rating: 5, comment: 'gak nyesel, bagus banget' },
                                { id: 5, name: 'Alan Cain', avatar: './images/user/user-05.png', roomType: 'Queen Bed', date: '14 Feb 2025', rating: 5, comment: 'puas' }
                            ],
                            // --- Akhir Data & State Ulasan ---

                            // --- FUNGSI FAQ (openAddForm, saveFaq, dll) DIHAPUS ---

                            // --- Fungsi Ulasan (TETAP ADA) ---
                            openReviewDeleteModal(reviewId) {
                                this.reviewToDelete = reviewId;
                                this.showReviewDeleteModal = true;
                            },

                            deleteReview() {
                                this.reviews = this.reviews.filter(review => review.id !== this.reviewToDelete);
                                this.showReviewDeleteModal = false;
                                this.reviewToDelete = null;
                            }
                            // --- Akhir Fungsi Ulasan ---
                        }" class="relative">

                            <div
                                class="flex w-full rounded-lg overflow-hidden border border-gray-300 dark:border-gray-700 mb-6">
                                <button @click="activeTab = 'faq'"
                                    :class="activeTab === 'faq' ? 'bg-gray-700 text-white' :
                                        'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300'"
                                    class="w-1/2 py-3 px-4 font-medium transition-colors duration-300">
                                    FAQ
                                </button>
                                <button @click="activeTab = 'ulasan'"
                                    :class="activeTab === 'ulasan' ? 'bg-gray-700 text-white' :
                                        'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300'"
                                    class="w-1/2 py-3 px-4 font-medium transition-colors duration-300">
                                    Ulasan
                                </button>
                            </div>

                            <div class="min-h-[60vh]">
                                <div x-show="activeTab === 'faq'">

                                    {{-- Tampilkan notifikasi jika ada --}}
                                    @if (session('success'))
                                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                                            role="alert">
                                            <span class="block sm:inline">{{ session('success') }}</span>
                                        </div>
                                    @endif

                                    {{-- Tampilkan validasi error jika ada --}}
                                    @if ($errors->any())
                                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                                            role="alert">
                                            <strong class="font-bold">Oops! Ada kesalahan:</strong>
                                            <ul class="mt-2 list-disc list-inside">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    {{-- FORMULIR ADD / EDIT --}}
                                    <div
                                        class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 mb-6 border border-gray-200 dark:border-gray-700">

                                        {{-- Judul dinamis --}}
                                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">
                                            {{ isset($faqToEdit) ? 'Edit FAQ' : 'Tambah FAQ Baru' }}
                                        </h3>

                                        {{-- Form action dinamis --}}
                                        <form method="POST"
                                            action="{{ isset($faqToEdit) ? route('faq-ulasan.update', $faqToEdit->id) : route('faq-ulasan.store') }}">
                                            @csrf {{-- Token CSRF Wajib --}}

                                            {{-- Method PUT jika sedang edit --}}
                                            @if (isset($faqToEdit))
                                                @method('PUT')
                                            @endif

                                            <div class="mb-4">
                                                <label for="pertanyaan"
                                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Pertanyaan</label>
                                                {{-- Ganti x-model dengan name dan value --}}
                                                <textarea id="pertanyaan" name="pertanyaan" rows="3"                                                
                                                    class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 p-3 text-gray-800 dark:text-white focus:ring-blue-500 focus:border-blue-500 @error('pertanyaan') border-red-500 @enderror">{{ old('pertanyaan', $faqToEdit->pertanyaan ?? '') }}</textarea>
                                                @error('pertanyaan')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>
                                            <div class="mb-6">
                                                <label for="jawaban"
                                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Jawaban</label>
                                                {{-- Ganti x-model dengan name dan value --}}
                                                <textarea id="jawaban" name="jawaban" rows="5"                                                
                                                    class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 p-3 text-gray-800 dark:text-white focus:ring-blue-500 focus:border-blue-500 @error('jawaban') border-red-500 @enderror">{{ old('jawaban', $faqToEdit->jawaban ?? '') }}</textarea>
                                                @error('jawaban')
                                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror

                                            </div>
                                            <div class="flex justify-start space-x-3">

                                                {{-- Tombol Batal hanya muncul saat mode edit --}}
                                                @if (isset($faqToEdit))
                                                    <a href="{{ route('faq-ulasan.index') }}"
                                                        class="py-2 px-5 rounded-md font-medium text-white bg-red-600 hover:bg-red-700 transition-colors">
                                                        Batal
                                                    </a>
                                                @endif

                                                <button type="submit"
                                                    class="py-2 px-5 rounded-md font-medium bg-gray-200 text-gray-700 dark:bg-gray-600 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-500 transition-colors">
                                                    Simpan</button>

                                            </div>
                                        </form>

                                    </div>

                                    {{-- Tampilkan 'empty state' menggunakan Blade --}}
                                    @if ($faqs->isEmpty())
                                        <div class="flex items-center justify-center h-64">
                                            <p class="text-center text-gray-500 dark:text-gray-400 text-lg">
                                                FAQ belum tersedia.
                                            </p>
                                        </div>
                                    @endif

                                    <div class="space-y-6">
                                        {{-- Ganti <template x-for> dengan @foreach Blade --}}
                                        @foreach ($faqs as $faq)
                                            <div
                                                class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 border border-gray-200 dark:border-gray-700">
                                                <div class="mb-4">
                                                    <label
                                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Pertanyaan</label>

                                                    <textarea rows="3" class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 p-3 text-gray-800 dark:text-white" readonly>{{ $faq->pertanyaan }}</textarea>

                                                </div>
                                                <div class="mb-6">
                                                    <label
                                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Jawaban</label>

                                                    <textarea rows="5" class="w-full rounded-md border border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 p-3 text-gray-800 dark:text-white" readonly>{{ $faq->jawaban }}</textarea>

                                                </div>
                                                <div class="flex justify-start space-x-3">

                                                    {{-- Tombol Edit: ganti @click dengan href --}}
                                                    <a href="{{ route('faq-ulasan.index', ['edit' => $faq->id]) }}#pertanyaan"
                                                        nbsp;
                                                        class="text-gray-400 hover:text-blue-600 transition-colors p-2 rounded-full hover:bg-blue-100 dark:hover:bg-blue-900/20"
                                                        aria-label="Edit FAQ">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">

                                                            </path>
                                                        </svg>
                                                    </a>

                                                    {{-- Tombol Delete: ganti @click dengan <form> --}}
                                                    <form method="POST"
                                                        action="{{ route('faq-ulasan.destroy', $faq->id) }}"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus FAQ ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-gray-400 hover:text-red-600 transition-colors p-2 rounded-full hover:bg-red-100 dark:hover:bg-red-900/20"
                                                            aria-label="Delete FAQ">
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">

                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">

                                                                </path>

                                                            </svg>
                                                        </button>
                                                    </form>

                                                </div>
                                            </div>
                                        @endforeach

                                    </div>

                                </div>
                                <div x-show="activeTab === 'ulasan'">
                                    <template x-if="reviews.length === 0">
                                        <div class="flex items-center justify-center h-64">
                                            <p class="text-center text-gray-500 dark:text-gray-400 text-lg">
                                                Ulasan belum tersedia.
                                            </p>
                                        </div>
                                    </template>

                                    <template x-if="reviews.length > 0">
                                        <div>
                                            <div class="flex flex-wrap gap-2 mb-6">

                                                <button @click="activeReviewFilter = 'all'"
                                                    :class="activeReviewFilter === 'all' ? 'bg-gray-700 text-white' :
                                                        'bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300'"
                                                    class="flex items-center gap-2 rounded-lg py-2 px-4 font-medium transition-colors">
                                                    <svg class="w-5 h-5 text-yellow-500" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10.868 2.884c-.321-.769-1.415-.769-1.736 0l-1.83 4.401-4.753.38c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.59l4.027 2.48c.713.436 1.598-.207 1.405-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.651l-4.753-.38-1.83-4.401z">
                                                        </path>
                                                    </svg>
                                                    <span>(Semua)</span>
                                                </button>
                                                <template x-for="star in [5, 4, 3, 2, 1]" :key="star">

                                                    <button @click="activeReviewFilter = star"
                                                        :class="activeReviewFilter === star ? 'bg-gray-700 text-white' :
                                                            'bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300'"
                                                        class="flex items-center gap-2 rounded-lg py-2 px-4 font-medium transition-colors">
                                                        <svg class="w-5 h-5 text-yellow-500" fill="currentColor"
                                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M10.868 2.884c-.321-.769-1.415-.769-1.736 0l-1.83 4.401-4.753.38c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.59l4.027 2.48c.713.436 1.598-.207 1.405-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.651l-4.753-.38-1.83-4.401z">
                                                            </path>
                                                        </svg>
                                                        <span x-text="`(${star})`"></span>
                                                    </button>
                                                </template>
                                            </div>

                                            <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow">
                                                <div class="min-w-[1100px]">
                                                    <template x-for="review in reviews" :key="review.id">
                                                        <div x-show="activeReviewFilter === 'all' || activeReviewFilter === review.rating"
                                                            x-transition
                                                            class="grid grid-cols-12 gap-4 items-center py-4 px-5 border-b border-gray-200 dark:border-gray-700 last:border-b-0">
                                                            <div class="col-span-3 flex items-center gap-3">
                                                                <img :src="review.avatar" alt="Avatar"
                                                                    class="w-10 h-10 rounded-full object-cover">
                                                                <span class="font-medium text-gray-800 dark:text-white"
                                                                    x-text="review.name"></span>
                                                            </div>
                                                            <div class="col-span-3 text-sm text-gray-600 dark:text-gray-400"
                                                                x-text="review.roomType"></div>
                                                            <div class="col-span-1 text-sm text-gray-600 dark:text-gray-400"
                                                                x-text="review.date"></div>

                                                            <div
                                                                class="col-span-1 flex items-center gap-1 text-sm text-gray-600 dark:text-gray-400">
                                                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor"
                                                                    viewBox="0 0 20 20"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M10.868 2.884c-.321-.769-1.415-.769-1.736 0l-1.83 4.401-4.753.38c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.59l4.027 2.48c.713.436 1.598-.207 1.405-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.651l-4.753-.38-1.83-4.401z">
                                                                    </path>
                                                                </svg>
                                                                (<span x-text="review.rating"></span>)
                                                            </div>

                                                            <div class="col-span-3 text-sm text-gray-800 dark:text-white"
                                                                x-text="review.comment"></div>
                                                            <div class="col-span-1 flex justify-start">
                                                                <button @click="openReviewDeleteModal(review.id)"
                                                                    class="text-gray-400 hover:text-red-600 transition-colors p-2 rounded-full hover:bg-red-100 dark:hover:bg-red-900/20">
                                                                    <svg class="w-5 h-5" fill="none"
                                                                        stroke="currentColor" viewBox="0 0 24 24"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                                        </path>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </template>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>

                            {{-- Tombol FAB (Floating Action Button) dihapus karena form 'Tambah' sudah di atas --}}

                            {{-- Modal Delete FAQ Dihapus, karena kita pakai 'confirm' browser --}}

                            {{-- Modal Delete Ulasan (TETAP ADA) --}}
                            <div x-show="showReviewDeleteModal" @click.outside="showReviewDeleteModal = false"
                                class="absolute inset-0 flex items-center justify-center z-50 p-4" style="display: none;"
                                x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                {{-- ... Isi modal delete ulasan ... --}}
                            </div>

                        </div>
                    </div>
                </main>
            </div>
        </div>

        <script defer src="/js/admin/bundle.js"></script>
    </body>
@endsection
