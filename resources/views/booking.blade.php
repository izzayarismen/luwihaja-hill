@extends('layouts/profile')

@section('content')
    <section id="cart" class="cart section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <form action="/booking/{{ $akomodasi->id }}" method="POST">
            @csrf
                <div class="row g-4">
                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
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
                                                <img src="{{ trim(explode(',', $akomodasi->gambar)[0]) }}" alt="Product" class="img-fluid"
                                                    loading="lazy">
                                            </div>
                                            <div class="product-details">
                                                <h6 class="product-title">{{ $akomodasi->tipe }}</h6>
                                                <div class="product-meta">
                                                    <span class="product-color"><i
                                                            class="bi bi-people"></i>{{ $akomodasi->jumlah_tamu }}
                                                        Tamu</span>
                                                    <span class="product-color"><i
                                                            class="bi bi-moon"></i>{{ $akomodasi->tipe_kasur }} Bed</span>
                                                    <span class="product-color"><i
                                                            class="bi bi-house"></i>{{ $akomodasi->luas }} m²</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-2 text-center">
                                        <div class="price-tag">
                                            <span class="current-price">{{ $tanggal_masuk }}</span>
                                            <input type="text" name="tanggal_masuk" value="{{ $raw_tanggal_masuk }}" hidden>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-2 text-center">
                                        <i class="bi bi-moon-stars"></i>
                                        <h6 class="product-title">{{ $jumlah_malam }} Malam</h6>
                                    </div>
                                    <div class="col-12 col-lg-2 text-center">
                                        <div class="price-tag">
                                            <span class="current-price">{{ $tanggal_keluar }}</span>
                                            <input type="text" name="tanggal_keluar" value="{{ $raw_tanggal_keluar }}" hidden>
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
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label for="nama" class="form-label">Nama Lengkap</label>
                                        <input type="text" name="nama_pemesan" class="form-control" id="nama"
                                            value="{{ auth()->user()->nama }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email"
                                            value="{{ auth()->user()->email }}" disabled required>
                                        <input type="email" name="email_pemesan" class="form-control" id="email"
                                            value="{{ auth()->user()->email }}" hidden required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="tel" name="telepon_pemesan" class="form-control" id="phone"
                                            value="{{ auth()->user()->telepon }}" required>
                                    </div>
                                </div>
                            </div><!-- End Cart Item -->
                        </div>
                    </div>

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="cart-summary">
                            <h4 class="summary-title">Ringkasan Pesanan</h4>

                            <div class="summary-item">
                                <span class="summary-label">Harga Asli</span>
                                @if ($akomodasi->harga_diskon != null)
                                    <span class="summary-value"
                                        style="text-decoration: line-through">{{ @currency($akomodasi->harga_asli) }}</span>
                                @else
                                    <span class="summary-value">{{ @currency($akomodasi->harga_asli) }}</span>
                                @endif
                            </div>

                            @if ($akomodasi->harga_diskon != null)
                                <div class="summary-item discount">
                                    <span class="summary-label">Harga Diskon</span>
                                    <span class="summary-value">{{ @currency($akomodasi->harga_diskon) }}</span>
                                </div>
                            @endif

                            <div class="summary-item">
                                <span class="summary-label">Jumlah Malam</span>
                                <span class="summary-value">{{ $jumlah_malam }} Malam</span>
                            </div>

                            <div class="summary-total">
                                <span class="summary-label">Total</span>
                                <span
                                    class="summary-value">{{ @currency($akomodasi->harga_diskon != null ? $akomodasi->harga_diskon * $jumlah_malam : $akomodasi->harga_asli * $jumlah_malam) }}</span>
                                <input type="text" name="total_harga"
                                    value="{{ $akomodasi->harga_diskon != null ? $akomodasi->harga_diskon * $jumlah_malam : $akomodasi->harga_asli * $jumlah_malam }}"
                                    hidden id="total">
                            </div>

                            <div class="checkout-button">
                                <button type="submit" href="/payment" class="btn btn-accent w-100">
                                    Lanjut ke Pemayaran <i class="bi bi-arrow-right"></i>
                                </button>
                            </div>

                            <div class="continue-shopping">
                                <a href="/akomodasi/{{ $akomodasi->id }}" class="btn btn-link w-100">
                                    <i class="bi bi-arrow-left"></i> Kembali ke Akomodasi
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </section><!-- /Cart Section -->
@endsection
