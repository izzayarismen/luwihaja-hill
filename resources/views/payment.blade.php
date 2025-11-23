@extends('layouts/profile')

@php
    use Carbon\Carbon;
@endphp

@section('content')
    <section id="checkout" class="checkout section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
                <div class="col-lg-5">
                    <!-- Order Summary -->
                    <div class="order-summary" data-aos="fade-left" data-aos-delay="200">
                        <div class="order-summary-header">
                            <h3>Ringkasan Pesanan</h3>
                            {{-- <span class="item-count">2 Items</span> --}}
                        </div>

                        <div class="order-summary-content">
                            <div class="order-items">
                                <div class="order-item">
                                    <div class="order-item-image">
                                        <img src="{{ trim(explode(',', $order->akomodasi->gambar)[0]) }}" alt="Product" class="img-fluid">
                                    </div>
                                    <div class="order-item-details">
                                        <h4>{{ $order->akomodasi->tipe }}</h4>
                                        <p class="order-item-variant"></p>
                                        <p class="order-item-variant">Masuk: {{ Carbon::parse($order->tanggal_masuk)->translatedFormat('D, d M Y') }}</p>
                                        <p class="order-item-variant">Keluar: {{ Carbon::parse($order->tanggal_keluar)->translatedFormat('D, d M Y') }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="order-totals">
                                <div class="order-subtotal d-flex justify-content-between">
                                    <span>Harga Asli</span>
                                    @if ($order->akomodasi->harga_diskon != null)
                                    <span style="text-decoration: line-through">{{ @currency($order->akomodasi->harga_asli) }}</span>
                                    @else
                                    <span>{{ @currency($order->akomodasi->harga_asli) }}</span>
                                    @endif
                                </div>
                                @if ($order->akomodasi->harga_diskon != null)
                                <div class="order-shipping d-flex justify-content-between">
                                    <span>Harga Diskon</span>
                                    <span>{{ @currency($order->akomodasi->harga_diskon) }}</span>
                                </div>
                                @endif
                                <div class="order-tax d-flex justify-content-between">
                                    <span>Jumlah Malam</span>
                                    <span>{{ Carbon::parse($order->tanggal_masuk)->diffInDays(Carbon::parse($order->tanggal_keluar)) }} Malam</span>
                                </div>
                                <div class="order-total d-flex justify-content-between">
                                    <span>Total Harga</span>
                                    <span>{{ @currency($order->total_harga) }}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <!-- Checkout Form -->
                    <div class="checkout-container" data-aos="fade-up">
                        <form action="/payment/{{ $order->order_id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <!-- Payment Method -->
                            <div class="checkout-section" id="payment-method">
                                <div class="section-header">
                                    <div class="section-number">1</div>
                                    <h3>Metode Pembayaran</h3>
                                </div>
                                <div class="section-content">
                                    <div class="payment-options">
                                        <div class="payment-option active">
                                            <input type="radio" id="credit-card" checked name="payment_method">
                                            <label for="credit-card">
                                                <span class="payment-icon"><i
                                                        class="bi bi-credit-card-2-front"></i></span>
                                                <span class="payment-label">Transfer BCA</span>
                                            </label>
                                        </div>
                                        <div class="payment-option">
                                            <input type="radio" id="paypal" name="payment_method">
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
                                                <input type="text" class="form-control"
                                                    id="card-number" value="7360334401" disabled>
                                                <div class="card-icons">
                                                    <i class="bi bi-credit-card"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="card-name">Atas Nama</label>
                                            <div class="card-number-wrapper">
                                                <input type="text" class="form-control" id="card-name"
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
                                    <div class="form-group">
                                        <label for="bukti_pembayaran">Upload Bukti Pembayaran</label>
                                        <input type="file" class="form-control" name="bukti_pembayaran" id="bukti_pembayaran" accept="image/*" required>
                                    </div>
                                    <div id="preview-wrapper" class="text-center" hidden>
                                        <img id="preview-image" class="img-fluid" src="" alt="Preview" style="max-width: 200px;">
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
                                            <span class="btn-text">Kirim Bukti Pembayaran</span>
                                            <span class="btn-price">{{ @currency($order->total_harga) }}</span>
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
    <script>
        document.getElementById("bukti_pembayaran").addEventListener("change", function(event) {
            const file = event.target.files[0];

            if (file) {
                const previewWrapper = document.getElementById("preview-wrapper");
                const previewImage = document.getElementById("preview-image");

                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;

                    // remove attribute hidden
                    previewWrapper.removeAttribute("hidden");
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
