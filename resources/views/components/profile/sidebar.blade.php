<!-- Profile Menu -->
<div class="col-lg-3">
    <div class="profile-menu collapse d-lg-block" id="profileMenu">
        <!-- User Info -->
        <div class="user-info" data-aos="fade-right">
            <div class="user-avatar">
                <img src="{{ Auth::user()->foto }}" alt="Profile" loading="lazy">
            </div>
            <h4>{{ Auth::user()->nama }}</h4>
        </div>

        <!-- Navigation Menu -->
        <nav class="menu-nav">
            <ul class="nav flex-column" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#settings">
                        <i class="bi bi-gear"></i>
                        <span>Pengaturan Akun</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#orders">
                        <i class="bi bi-box-seam"></i>
                        <span>Pesanan Saya</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#reviews">
                        <i class="bi bi-star"></i>
                        <span>Ulasan Saya</span>
                    </a>
                </li>
            </ul>

            <div class="menu-footer">
                <a href="/logout" class="logout-link">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Keluar</span>
                </a>
            </div>
        </nav>
    </div>
</div>
