<!doctype html>
<html lang="en">

<head>

    <meta charset="UTF-8" />

    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />

    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title> Admin | Villa dan Cafe Air Luwihaja Hill</title>

    <link href="/images/logo.png" rel="icon">
    <link href="/css/admin/style.css" rel="stylesheet">
</head>

<body x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"  >
    @include('components.admin.preloader')
    <div class="flex h-screen overflow-hidden">
        @include('components.admin.sidebar')
        <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
            <div @click="sidebarToggle = false"
                :class="sidebarToggle ? 'block lg:hidden' : 'hidden'"
                class="fixed w-full h-screen z-9 bg-gray-900/50"></div>
            @include('components.admin.header')
            <main class="flex-1 bg-gray-50 dark:bg-gray-900">
                @yield('content')
                </main>
            </div>
        </div>

    <script defer src="/js/admin/bundle.js"></script>
</body>

</html>
