@extends('layouts/profile')

@section('content')
    <section id="cart" class="cart section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-4">
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    <div class="cart-items">
                        <div class="cart-header d-none d-lg-block">
                            <div class="row align-items-center gy-4">
                                <div class="col-lg-6">
                                    <h5>Tipe Kamar</h5>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <h5>Tanggal Masuk</h5>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <h5></h5>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <h5>Tanggal Keluar</h5>
                                </div>
                            </div>
                        </div>

                        <!-- Cart Item 1 -->
                        <div class="cart-item" data-aos="fade-up" data-aos-delay="100">
                            <div class="row align-items-center gy-4">
                                <div class="col-lg-6 col-12 mb-3 mb-lg-0">
                                    <div class="product-info d-flex align-items-center">
                                        <div class="product-image">
                                            <img src="images/product-2.webp" alt="Product" class="img-fluid"
                                                loading="lazy">
                                        </div>
                                        <div class="product-details">
                                            <h6 class="product-title">Lorem ipsum dolor sit amet</h6>
                                            <div class="product-meta">
                                                <span class="product-color">Color: Black</span>
                                                <span class="product-size">Size: M</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-2 text-center">
                                    <div class="price-tag">
                                        <span class="current-price">Sab, 29 Nov 2025</span>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-2 text-center">
                                    <i class="bi bi-moon-stars"></i>
                                    <h6 class="product-title">1 Malam</h6>
                                </div>
                                <div class="col-12 col-lg-2 text-center">
                                    <div class="price-tag">
                                        <span class="current-price">Min, 30 Nov 2025</span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Cart Item -->
                    </div>
                    <div class="cart-items">
                        <div class="cart-header d-none d-lg-block">
                            <div class="row align-items-center gy-4">
                                <div class="col-lg-6">
                                    <h5>Informasi Pemesan</h5>
                                </div>
                            </div>
                        </div>

                        <!-- Cart Item 1 -->
                        <div class="cart-item" data-aos="fade-up" data-aos-delay="100">
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
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="tel" name="telepon" class="form-control" id="phone"
                                            value="{{ Auth::user()->telepon }}" required>
                                    </div>
                                </div>
                            </form>
                        </div><!-- End Cart Item -->
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="cart-summary">
                        <h4 class="summary-title">Ringkasan Pesanan</h4>

                        <div class="summary-item">
                            <span class="summary-label">Harga Asli</span>
                            <span class="summary-value">$269.96</span>
                        </div>

                        <div class="summary-item discount">
                            <span class="summary-label">Harga Diskon</span>
                            <span class="summary-value">-$0.00</span>
                        </div>

                        <div class="summary-item">
                            <span class="summary-label">Pajak</span>
                            <span class="summary-value">$27.00</span>
                        </div>

                        <div class="summary-total">
                            <span class="summary-label">Total</span>
                            <span class="summary-value">$301.95</span>
                        </div>

                        <div class="checkout-button">
                            <a href="/payment" class="btn btn-accent w-100">
                                Lanjut ke Pemayaran <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>

                        <div class="continue-shopping">
                            <a href="#" class="btn btn-link w-100">
                                <i class="bi bi-arrow-left"></i> Kembali ke Akomodasi
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Cart Section -->
@endsection
