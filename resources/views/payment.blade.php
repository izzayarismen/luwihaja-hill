@extends('layouts/profile')

@section('content')
    <section id="checkout" class="checkout section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
                <div class="col-lg-5">
                    <!-- Order Summary -->
                    <div class="order-summary" data-aos="fade-left" data-aos-delay="200">
                        <div class="order-summary-header">
                            <h3>Order Summary</h3>
                            <span class="item-count">2 Items</span>
                        </div>

                        <div class="order-summary-content">
                            <div class="order-items">
                                <div class="order-item">
                                    <div class="order-item-image">
                                        <img src="images/product-1.webp" alt="Product" class="img-fluid">
                                    </div>
                                    <div class="order-item-details">
                                        <h4>Lorem Ipsum Dolor</h4>
                                        <p class="order-item-variant">Color: Black | Size: M</p>
                                        <div class="order-item-price">
                                            <span class="quantity">1 ×</span>
                                            <span class="price">$89.99</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="order-totals">
                                <div class="order-subtotal d-flex justify-content-between">
                                    <span>Subtotal</span>
                                    <span>$209.97</span>
                                </div>
                                <div class="order-shipping d-flex justify-content-between">
                                    <span>Shipping</span>
                                    <span>$9.99</span>
                                </div>
                                <div class="order-tax d-flex justify-content-between">
                                    <span>Tax</span>
                                    <span>$21.00</span>
                                </div>
                                <div class="order-total d-flex justify-content-between">
                                    <span>Total</span>
                                    <span>$240.96</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <!-- Checkout Form -->
                    <div class="checkout-container" data-aos="fade-up">
                        <form class="checkout-form">
                            <!-- Payment Method -->
                            <div class="checkout-section" id="payment-method">
                                <div class="section-header">
                                    <div class="section-number">1</div>
                                    <h3>Metode Pembayaran</h3>
                                </div>
                                <div class="section-content">
                                    <div class="payment-options">
                                        <div class="payment-option active">
                                            <input type="radio" name="payment-method" id="credit-card" checked="">
                                            <label for="credit-card">
                                                <span class="payment-icon"><i
                                                        class="bi bi-credit-card-2-front"></i></span>
                                                <span class="payment-label">Transfer BCA</span>
                                            </label>
                                        </div>
                                        <div class="payment-option">
                                            <input type="radio" name="payment-method" id="paypal">
                                            <label for="paypal">
                                                <span class="payment-icon"><i class="bi bi-qr-code-scan"></i></span>
                                                <span class="payment-label">QRIS</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="payment-details" id="credit-card-details">
                                        <div class="form-group">
                                            <label for="card-number">No. Rekening</label>
                                            <div class="card-number-wrapper">
                                                <input type="text" class="form-control" name="card-number"
                                                    id="card-number" value="7360334401" disabled>
                                                <div class="card-icons">
                                                    <i class="bi bi-credit-card"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="card-name">Atas Nama</label>
                                            <div class="card-number-wrapper">
                                                <input type="text" class="form-control" name="card-name" id="card-name"
                                                    value="Lulu Fatimah" disabled>
                                                <div class="card-icons">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="payment-details d-none" id="paypal-details">
                                        <img src="https://d2v6npc8wmnkqk.cloudfront.net/storage/26035/conversions/Tipe-QRIS-statis-small-large.jpg" class="img-fluid" alt="QRIS">
                                        <p class="payment-info text-center">QRIS BCA a.n. Lulu Fatimah</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Customer Information -->
                            <div class="checkout-section" id="customer-info">
                                <div class="section-header">
                                    <div class="section-number">2</div>
                                    <h3>Upload Bukti Pembayaran</h3>
                                </div>
                                <div class="section-content">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="first-name">First Name</label>
                                            <input type="text" name="first-name" class="form-control" id="first-name"
                                                placeholder="Your First Name" required="">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="last-name">Last Name</label>
                                            <input type="text" name="last-name" class="form-control" id="last-name"
                                                placeholder="Your Last Name" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Your Email" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="tel" class="form-control" name="phone" id="phone"
                                            placeholder="Your Phone Number" required="">
                                    </div>
                                </div>
                            </div>

                            <!-- Order Review -->
                            <div class="checkout-section" id="order-review">
                                <div class="section-header">
                                    <div class="section-number">3</div>
                                    <h3>Informasi Penting</h3>
                                </div>
                                <div class="section-content">
                                    <div class="form-check terms-check">
                                        <ul class="mb-4">
                                            <li>Pastikan bukti pembayaran menunjukkan jumlah yang sesuai</li>
                                            <li>Upload screenshot atau foto yang jelas dan tidak blur</li>
                                            <li>Verifikasi akan dilakukan dalam 1-24 jam kerja</li>
                                            <li>Setelah terverifikasi, Tiket Check-in akan otomatis tersedia di halaman Profil pada akun Anda</li>
                                            <li>Jika tiket belum muncul setelah melewati 1x24 jam, harap segera hubungi kami melalui WhatsApp di 0821-1555-1822</li>
                                            <li>Mohon simpan bukti pembayaran asli hingga Anda menerima tiket check-in</li>
                                        </ul>
                                    </div>
                                    <div class="place-order-container">
                                        <button type="submit" class="btn btn-primary place-order-btn">
                                            <span class="btn-text">Place Order</span>
                                            <span class="btn-price">$240.96</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Checkout Section -->
@endsection
