@extends('layouts/profile')

@php
    use Carbon\Carbon;
@endphp

@section('content')
    <!-- Content Area -->
    <section id="account" class="account section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <!-- Mobile Menu Toggle -->
            <div class="mobile-menu d-lg-none mb-4">
                <button class="mobile-menu-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#profileMenu">
                    <i class="bi bi-grid"></i>
                    <span>Menu</span>
                </button>
            </div>

            <div class="row g-4">
                @include('components/profile/sidebar')
                <div class="col-lg-9">
                    <div class="content-area">
                        <div class="tab-content">
                            <!-- Settings Tab -->
                            <div class="tab-pane fade show active" id="settings">
                                <div class="section-header" data-aos="fade-up">
                                    <h2>Pengaturan Akun</h2>
                                </div>

                                <div class="settings-content">
                                    <!-- Personal Information -->
                                    @if (session('success'))
                                        <div class="bg-success border border-success text-white px-4 py-3 rounded relative mb-4"
                                            role="alert">
                                            <span class="block sm:inline">{{ session('success') }}</span>
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div class="bg-danger border border-danger text-white px-4 py-3 rounded relative mb-4"
                                            role="alert">
                                            <span class="block sm:inline">{{ session('error') }}</span>
                                        </div>
                                    @endif

                                    {{-- Tampilkan validasi error jika ada --}}
                                    @if ($errors->any())
                                        <div class="bg-danger border border-danger text-white px-4 py-3 rounded relative mb-4"
                                            role="alert">
                                            <strong class="font-bold">Oops! Ada kesalahan:</strong>
                                            <ul class="mt-2 list-disc list-inside">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="settings-section" data-aos="fade-up">
                                        <h3>Informasi Pribadi</h3>
                                        <form class="settings-form" action="/profile" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="row g-3">
                                                <div class="col-md-12">
                                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                                    <input type="text" name="nama" class="form-control" id="nama"
                                                        value="{{ Auth::user()->nama }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" name="email" class="form-control" id="email"
                                                        value="{{ Auth::user()->email }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="phone" class="form-label">Nomor Telepon</label>
                                                    <input type="tel" name="telepon" class="form-control" pattern="[0-9]+"
                                                        value="{{ Auth::user()->telepon }}" required>
                                                </div>
                                            </div>

                                            <div class="form-buttons">
                                                <button type="submit" class="btn-save">Simpan Perubahan</button>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Security Settings -->
                                    <div class="settings-section" data-aos="fade-up" data-aos-delay="200">
                                        <h3>Keamanan</h3>
                                        <form class="settings-form" action="/profile/password" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row g-3">
                                                <div class="col-md-12">
                                                    <label for="currentPassword" class="form-label">Kata Sandi Saat Ini</label>
                                                    <input type="password" name="current_password" class="form-control" id="currentPassword" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="newPassword" class="form-label">Kata Sandi Baru</label>
                                                    <input type="password" name="password" class="form-control" id="newPassword" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="confirmPassword" class="form-label">Konfirmasi Kata Sandi</label>
                                                    <input type="password" name="confirm_password" class="form-control" id="confirmPassword" required>
                                                </div>
                                            </div>

                                            <div class="form-buttons">
                                                <button type="submit" class="btn-save">Perbarui Kata Sandi</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Orders Tab -->
                            <div class="tab-pane fade" id="orders">
                                <div class="section-header" data-aos="fade-up">
                                    <h2>Pesanan Saya</h2>
                                    <div class="header-actions">
                                        <div class="dropdown">
                                            <button class="filter-btn" data-bs-toggle="dropdown">
                                                <i class="bi bi-funnel"></i>
                                                <span>Filter</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Semua Pesanan</a></li>
                                                <li><a class="dropdown-item" href="#">Belum Dibayar</a></li>
                                                <li><a class="dropdown-item" href="#">Menunggu Verifikasi</a></li>
                                                <li><a class="dropdown-item" href="#">Terverifikasi</a></li>
                                                <li><a class="dropdown-item" href="#">Selesai</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="orders-grid">
                                    @forelse ($pesanan_saya as $item)
                                    <!-- Order Card 1 -->
                                    <div class="order-card" data-aos="fade-up" data-aos-delay="100">
                                        <div class="order-header">
                                            <div class="order-id">
                                                <span class="label">Order ID:</span>
                                                <span class="value">#{{ $item->order_id }}</span>
                                            </div>
                                            <div class="order-date">{{ Carbon::parse($item->created_at)->translatedFormat('D, d M Y') }}</div>
                                        </div>
                                        <div class="order-content">
                                            <div class="product-grid">
                                                <img src="{{ trim(explode(',', $item->akomodasi->gambar)[0]) }}" alt="Product" loading="lazy">
                                            </div>
                                            <div class="order-info">
                                                <div class="info-row">
                                                    <span>Status</span>
                                                    @if ($item->status == 'unpayed')
                                                    <span class="status cancelled">Belum Dibayar</span>
                                                    @elseif ($item->status == 'pending')
                                                    <span class="status processing">Menunggu Verifikasi</span>
                                                    @elseif ($item->status == 'verified')
                                                    <span class="status delivered">Terverifikasi</span>
                                                    @else
                                                    <span class="status shipped">Selesai</span>
                                                    @endif
                                                </div>
                                                <div class="info-row">
                                                    <span>Tanggal Masuk</span>
                                                    <span>{{ Carbon::parse($item->tanggal_masuk)->translatedFormat('D, d M Y') }}</span>
                                                </div>
                                                <div class="info-row">
                                                    <span>Tanggal Keluar</span>
                                                    <span>{{ Carbon::parse($item->tanggal_keluar)->translatedFormat('D, d M Y') }}</span>
                                                </div>
                                                <div class="info-row">
                                                    <span>Total</span>
                                                    <span class="price">{{ @currency($item->total_harga) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="order-footer">
                                            <button type="button" class="btn-track" data-bs-toggle="collapse"
                                                data-bs-target="#tracking-{{$item->id}}" aria-expanded="false">Lihat Status</button>
                                                @if ($item->status == 'verified' || $item->status == 'finished')
                                                <button type="button" class="btn-details" data-bs-toggle="collapse" data-bs-target="#details{{ $item->id }}" aria-expanded="false">Cek Tiket</button>
                                            @endif
                                        </div>

                                        <!-- Order Tracking -->
                                        <div class="collapse tracking-info" id="tracking-{{$item->id}}">
                                            <div class="tracking-timeline">
                                                <div class="timeline-item {{ $item->status == 'unpayed' ? 'active' : ($item->status == 'pending' || $item->status == 'verified' || $item->status == 'finished' ? 'completed' : '') }}">
                                                    <div class="timeline-icon">
                                                        @if ($item->status == 'pending' || $item->status == 'verified' || $item->status == 'finished')
                                                        <i class="bi bi-check-circle-fill"></i>
                                                        @else
                                                        <i class="bi bi-cash-stack"></i>
                                                        @endif
                                                    </div>
                                                    <div class="timeline-content">
                                                        <h5>{{ $item->status != 'unpayed' ? 'Sudah' : 'Belum' }} Dibayar</h5>
                                                        @if ($item->status != 'unpayed')
                                                        <p>Pembayaran berhasil. Lihat bukti transfer <a href="{{ $item->bukti_pembayaran }}" target="_blank">[di sini]</a>.</p>
                                                        @else
                                                        <p>Menunggu pembayaran. Selesaikan transaksi Anda segera <a href="/payment/{{ $item->order_id }}">[di sini]</a>.</p>
                                                        @endif
                                                        <span class="timeline-date">Feb 20, 2025 - 10:30 AM</span>
                                                    </div>
                                                </div>

                                                @if ($item->status == 'pending' || $item->status == 'verified' || $item->status == 'finished')
                                                <div class="timeline-item {{ $item->status == 'pending' ? 'active' : ($item->status == 'verified' || $item->status == 'finished' ? 'completed' : '') }}">
                                                    <div class="timeline-icon">
                                                        @if ($item->status == 'verified' || $item->status == 'finished')
                                                        <i class="bi bi-check-circle-fill"></i>
                                                        @else
                                                        <i class="bi bi-hourglass-split"></i>
                                                        @endif
                                                    </div>

                                                    <div class="timeline-content">
                                                        <h5>{{ $item->status == 'verified' || $item->status == 'finished' ? 'Terverifikasi' : 'Menunggu Verifikasi' }}</h5>
                                                        @if ($item->status == 'verified' || $item->status == 'finished')
                                                        <p>Pesanan dikonfirmasi. Silakan lihat E-Tiket Anda pada menu Cek Tiket.</p>
                                                        @else
                                                        <p>Sedang diverifikasi admin. Jika dalam 24 jam status belum berubah, mohon hubungi kami <a href="wa.me/6282115551822"></a>[di sini].</p>
                                                        @endif
                                                        <span class="timeline-date">Feb 20, 2025 - 2:45 PM</span>
                                                    </div>
                                                </div>
                                                @endif

                                                @if ($item->status == 'verified' || $item->status == 'finished')
                                                <div class="timeline-item {{ $item->status == 'finished' ? 'completed' : ($item->status == 'verified' ? 'active' : '') }}">
                                                    <div class="timeline-icon">
                                                        @if ($item->status == 'finished')
                                                        <i class="bi bi-check-circle-fill"></i>
                                                        @else
                                                        <i class="bi bi-moon-stars"></i>
                                                        @endif
                                                    </div>
                                                    <div class="timeline-content">
                                                        <h5>{{ $item->status == 'finished' ? 'Selesai' : 'Menunggu Check-in' }}</h5>
                                                        @if ($item->status == 'finished')
                                                        <p>Pesanan selesai. Terima kasih telah menginap.</p>
                                                        @else
                                                        <p>Siap untuk check-in pada {{ Carbon::parse($item->tanggal_masuk)->translatedFormat('D, d M Y') }}, pukul 14:00 - 21:00 WIB.</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Order Details -->
                                        <div class="collapse order-details" id="details{{ $item->id }}">
                                            <div class="details-content">
                                                <div class="detail-section">
                                                    <h5>E-Tiket #{{ $item->order_id }}</h5>
                                                    <div class="info-grid">
                                                        <div class="info-item">
                                                            <span class="label">Nama Pemesan</span>
                                                            <span class="value">{{ $item->nama_pemesan }}</span>
                                                        </div>
                                                        <div class="info-item">
                                                            <span class="label">Alamat Email</span>
                                                            <span class="value">{{ $item->email_pemesan }}</span>
                                                        </div>
                                                        <div class="info-item">
                                                            <span class="label">Nomor Telepon</span>
                                                            <span class="value">{{ $item->telepon_pemesan }}</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="detail-section">
                                                    <h5>Akomodasi</h5>
                                                    <div class="order-items">
                                                        <div class="item">
                                                            <img src="{{ trim(explode(',', $item->akomodasi->gambar)[0]) }}" alt="Product"
                                                                loading="lazy">
                                                            <div class="item-info">
                                                                <h6>{{ $item->akomodasi->tipe }}</h6>
                                                                <div class="item-meta">
                                                                    <span class="sku">{{ Carbon::parse($item->tanggal_masuk)->translatedFormat('D, d M Y') }}</span>
                                                                    <span>-</span>
                                                                    <span class="qty">{{ Carbon::parse($item->tanggal_keluar)->translatedFormat('D, d M Y') }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="item-price">
                                                                <i class="bi bi-moon-stars"></i>
                                                                <span class="mx-1"></span>
                                                                {{ Carbon::parse($item->tanggal_masuk)->diffInDays(Carbon::parse($item->tanggal_keluar)) }} Malam
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="detail-section">
                                                    <h5>Pembayaran</h5>
                                                    <div class="price-breakdown">
                                                        <div class="price-row total">
                                                            <span>Total Harga</span>
                                                            <span>{{ @currency($item->total_harga) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <p class="text-center">Belum ada pesanan.</p>
                                    @endforelse
                                </div>
                            </div>

                            <!-- Reviews Tab -->
                            <div class="tab-pane fade" id="reviews">
                                <div class="section-header" data-aos="fade-up">
                                    <h2>My Reviews</h2>
                                    <div class="header-actions">
                                        <div class="dropdown">
                                            <button class="filter-btn" data-bs-toggle="dropdown">
                                                <i class="bi bi-funnel"></i>
                                                <span>Sort by: Recent</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Recent</a></li>
                                                <li><a class="dropdown-item" href="#">Highest Rating</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">Lowest Rating</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="reviews-grid">
                                    <!-- Review Card 1 -->
                                    <div class="review-card" data-aos="fade-up" data-aos-delay="100">
                                        <div class="review-header">
                                            <img src="images/product-1.webp" alt="Product" class="product-image"
                                                loading="lazy">
                                            <div class="review-meta">
                                                <h4>Lorem ipsum dolor sit amet</h4>
                                                <div class="rating">
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <span>(5.0)</span>
                                                </div>
                                                <div class="review-date">Reviewed on Feb 15, 2025</div>
                                            </div>
                                        </div>
                                        <div class="review-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                        <div class="review-footer">
                                            <button type="button" class="btn-edit">Edit Review</button>
                                            <button type="button" class="btn-delete">Delete</button>
                                        </div>
                                    </div>

                                    <!-- Review Card 2 -->
                                    <div class="review-card" data-aos="fade-up" data-aos-delay="200">
                                        <div class="review-header">
                                            <img src="images/product-2.webp" alt="Product" class="product-image"
                                                loading="lazy">
                                            <div class="review-meta">
                                                <h4>Consectetur adipiscing elit</h4>
                                                <div class="rating">
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star"></i>
                                                    <span>(4.0)</span>
                                                </div>
                                                <div class="review-date">Reviewed on Feb 10, 2025</div>
                                            </div>
                                        </div>
                                        <div class="review-content">
                                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                                nisi ut aliquip ex ea commodo consequat.</p>
                                        </div>
                                        <div class="review-footer">
                                            <button type="button" class="btn-edit">Edit Review</button>
                                            <button type="button" class="btn-delete">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

@endsection
