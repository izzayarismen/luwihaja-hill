<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
            <img src="/images/logo.png" alt="Luwihaja Hill" class="logo">
            <h1 class="sitename">Luwihaja Hill</h1>
        </a>
        <nav id="navmenu" class="navmenu">
            <ul>
            <li><a href="/" class="{{ $active == 'beranda' ? 'active' : '' }}">Beranda</a></li>
            <li><a href="/tentang-kami" class="{{ $active == 'tentang-kami' ? 'active' : '' }}">Tentang Kami</a></li>
            <li><a href="/akomodasi" class="{{ $active == 'akomodasi' ? 'active' : '' }}">Akomodasi</a></li>
            <li><a href="/#faq" class="{{ $active == 'faq' ? 'active' : '' }}">FAQ</a></li>
            <li><a href="/#lokasi" class="{{ $active == 'lokasi' ? 'active' : '' }}">Lokasi</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        @auth
        <a class="btn-getstarted d-none d-sm-block" href="/profile"><i class="bi bi-person"></i> Profile</a>
        @else
        <a class="btn-getstarted d-none d-sm-block" href="/login">Login</a>
        @endauth
    </div>
</header>
