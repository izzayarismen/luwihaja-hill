@extends('layouts/admin')

@section('content')
<body x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }">
    @include('components/admin/preloader')

    <div class="flex h-screen overflow-hidden">
        @include('components/admin/sidebar')

        <div class="relative flex flex-1 flex-col overflow-x-hidden overflow-y-auto">
            @include('components/admin/overlay')
            @include('components/admin/header')

            <main class="flex-1 bg-gray-50 dark:bg-gray-900">
                <div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6">
                    <div x-data="{ pageName: 'Dashboard' }">
                        <include src="./partials/breadcrumb.html" />
                        @include('components/admin/breadcrumb')
                    </div>
                    <div class="grid grid-cols-12 gap-4 md:gap-6">
                        <div class="col-span-12 space-y-6">
                            @include('components/admin/metric')
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script defer src="/js/admin/bundle.js"></script>
</body>
@endsection
