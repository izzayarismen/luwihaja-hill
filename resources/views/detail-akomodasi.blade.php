@extends('layouts/main')

@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(/images/header.jpg);">
        <div class="container position-relative">
            <h1>Detail Akomodasi</h1>
            <p>Jelajahi detail fasilitas modern dan pemandangan alam menenangkan yang kami siapkan untuk pengalaman menginap
                Anda yang tak terlupakan.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">Beranda</a></li>
                    <li class="current">Detail Akomodasi</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Room Details Section -->
    <section id="room-details" class="room-details section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
                <!-- Room Gallery -->
                <div class="col-lg-8">
                    <div class="room-gallery">
                        <div class="main-image-container image-zoom-container">
                            <img id="main-product-image" src="{{ $akomodasi->gambar }}" alt="{{ $akomodasi->tipe }}"
                                class="img-fluid main-room-image" data-zoom="{{ $akomodasi->gambar }}">
                            <div class="image-nav-buttons">
                                <button class="image-nav-btn prev-image" type="button">
                                    <i class="bi bi-chevron-left"></i>
                                </button>
                                <button class="image-nav-btn next-image" type="button">
                                    <i class="bi bi-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                        <div class="thumbnail-gallery thumbnail-list">
                            <div class="thumbnail-item active" data-image="{{ $akomodasi->gambar }}">
                                <img src="{{ $akomodasi->gambar }}" alt="{{ $akomodasi->tipe }}" class="img-fluid">
                            </div>
                            <div class="thumbnail-item" data-image="/images/room-3.webp">
                                <img src="/images/room-3.webp" alt="Bedroom View" class="img-fluid">
                            </div>
                            <div class="thumbnail-item" data-image="/images/room-7.webp">
                                <img src="/images/room-7.webp" alt="Bathroom" class="img-fluid">
                            </div>
                            <div class="thumbnail-item" data-image="/images/room-12.webp">
                                <img src="/images/room-12.webp" alt="City View" class="img-fluid">
                            </div>
                            <div class="thumbnail-item" data-image="/images/room-15.webp">
                                <img src="/images/room-15.webp" alt="Living Area" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div><!-- End Room Gallery -->

                <!-- Room Details Sidebar -->
                <div class="col-lg-4">
                    <div class="room-details-sidebar" data-aos="fade-left" data-aos-delay="200">
                        <div class="room-header">
                            <h2>{{ $akomodasi->tipe }}</h2>
                            <div class="room-rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <span class="rating-text">(4.9)</span>
                            </div>
                        </div>

                        <div class="room-price">
                            @if ($akomodasi->harga_diskon)
                                <p class="price-note" style="text-decoration: line-through">
                                    {{ @currency($akomodasi->harga_asli) }} / malam</p>
                            @endif
                            <div class="price-value">
                                <span
                                    class="amount">{{ $akomodasi->harga_diskon ? @currency($akomodasi->harga_diskon) : @currency($akomodasi->harga_asli) }}</span>
                                <span class="period"> / malam</span>
                            </div>
                            <p class="price-note">*Pajak dan biaya lain tidak termasuk</p>
                        </div>

                        <div class="booking-form">
                            <form action="/booking/{{ $akomodasi->id }}?tanggal_masuk={{ request('tanggal_masuk') }}&tanggal_keluar={{ request('tanggal_keluar') }}" method="GET">
                                @if (session('error'))
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                                        role="alert">
                                        <span class="block sm:inline">{{ session('error') }}</span>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="checkin-date" class="form-label">Tanggal Masuk</label>
                                        <input type="text" class="form-control" id="checkin-date" name="tanggal_masuk" min="{{ date('Y-m-d') }}" required autocomplete="off">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="checkout-date" class="form-label">Tanggal Keluar</label>
                                        <input type="text" class="form-control" id="checkout-date" name="tanggal_keluar" min="{{ date('Y-m-d') }}" required autocomplete="off">
                                        <small id="date-error" style="color:red; display:none;">
                                            Tanggal keluar harus setelah tanggal masuk.
                                        </small>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-book" id="submit-btn">
                                    <i class="bi bi-calendar-check me-2"></i>
                                    Pesan Sekarang
                                </button>
                            </form>
                        </div>

                    </div>
                </div><!-- End Room Details Sidebar -->
            </div>

            <div class="row mt-5">
                <div class="col-12">
                    <div class="room-info-tabs" data-aos="fade-up" data-aos-delay="300">
                        <ul class="nav nav-tabs" id="roomTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="overview-tab" data-bs-toggle="tab"
                                    data-bs-target="#room-details-overview" type="button"
                                    role="tab">Gambaran Umum</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab"
                                    data-bs-target="#room-details-kebijakan" type="button" role="tab">Kebijakan Lainnya</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab"
                                    data-bs-target="#room-details-reviews" type="button" role="tab">Ulasan</button>
                            </li>

                        </ul>

                        <div class="tab-content mt-4" id="roomTabsContent">
                            <div class="tab-pane fade show active" id="room-details-overview" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <h3>Deskripsi Kamar</h3>
                                        <p class="room-description">
                                            {{ $akomodasi->deskripsi }}
                                        </p>

                                        <div class="room-features-grid mt-4">
                                            <div class="feature-item">
                                                <i class="bi bi-people"></i>
                                                <div class="feature-info">
                                                    <h5>Jumlah Tamu</h5>
                                                    <p>{{ $akomodasi->jumlah_tamu }} Orang</p>
                                                </div>
                                            </div>
                                            <div class="feature-item">
                                                <i class="bi bi-arrows-fullscreen"></i>
                                                <div class="feature-info">
                                                    <h5>Luas Kamar</h5>
                                                    <p>{{ $akomodasi->luas }} m²</p>
                                                </div>
                                            </div>
                                            <div class="feature-item">
                                                <i class="bi bi-moon"></i>
                                                <div class="feature-info">
                                                    <h5>Tipe Kasur</h5>
                                                    <p>{{ $akomodasi->tipe_kasur }} Bed</p>
                                                </div>
                                            </div>
                                        </div>

                                        <h4 class="mt-4">Fasilitas</h4>
                                        <ul>
                                            @foreach ($fasilitas as $item)
                                            <li>{{ $item }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="room-stats">
                                            <h4>Prosedur Check-in</h4>
                                            <div class="stat-item">
                                                <span class="stat-label">Check-in:</span>
                                                <span class="stat-value">{{ $akomodasi->checkin }}</span>
                                            </div>
                                            <div class="stat-item">
                                                <span class="stat-label">Check-out:</span>
                                                <span class="stat-value">{{ $akomodasi->checkout }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show" id="room-details-kebijakan" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <h4>Anak</h4>
                                        <ul>
                                            <li>Tamu umur berapa pun bisa menginap di sini.</li>
                                            <li>Anak-anak 5 tahun ke atas dianggap sebagai tamu dewasa.</li>
                                            <li>Pastikan umur anak yang menginap sesuai dengan detail pemesanan. Jika berbeda, tamu mungkin akan dikenakan biaya tambahan saat check-in.</li>
                                        </ul>
                                        <h4>Ketentuan status pernikahan</h4>
                                        <ul>
                                            <li>Tamu yang datang berpasangan harus menunjukkan buku nikah saat check-in.</li>
                                        </ul>
                                        <h4>Deposit</h4>
                                        <ul>
                                            <li>Tamu tidak perlu membayar deposit saat check-in.</li>
                                        </ul>
                                        <h4>Umur</h4>
                                        <ul>
                                            <li>Tamu umur berapa pun bisa menginap di sini.</li>
                                        </ul>
                                        <h4>Sarapan</h4>
                                        <ul>
                                            <li>Sarapan tidak tersedia.</li>
                                        </ul>
                                        <h4>Hewan peliharaan</h4>
                                        <ul>
                                            <li>Tidak diperbolehkan membawa hewan peliharaan.</li>
                                        </ul>
                                        <h4>Alkohol</h4>
                                        <ul>
                                            <li>Minuman beralkohol tidak diperbolehkan.</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="room-stats">
                                            <h4>Prosedur Check-in</h4>
                                            <div class="stat-item">
                                                <span class="stat-label">Check-in:</span>
                                                <span class="stat-value">{{ $akomodasi->checkin }}</span>
                                            </div>
                                            <div class="stat-item">
                                                <span class="stat-label">Check-out:</span>
                                                <span class="stat-value">{{ $akomodasi->checkout }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="room-details-reviews" role="tabpanel">
                                <div class="reviews-section">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="review-summary">
                                                <div class="overall-rating">
                                                    <span class="rating-number">4.9</span>
                                                    <div class="rating-stars">
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                    </div>
                                                    <p class="review-count">Based on 247 reviews</p>
                                                </div>

                                                <div class="rating-breakdown">
                                                    <div class="rating-item">
                                                        <span class="rating-label">Cleanliness</span>
                                                        <div class="rating-bar">
                                                            <div class="rating-fill" style="width: 95%"></div>
                                                        </div>
                                                        <span class="rating-value">4.8</span>
                                                    </div>
                                                    <div class="rating-item">
                                                        <span class="rating-label">Comfort</span>
                                                        <div class="rating-bar">
                                                            <div class="rating-fill" style="width: 98%"></div>
                                                        </div>
                                                        <span class="rating-value">4.9</span>
                                                    </div>
                                                    <div class="rating-item">
                                                        <span class="rating-label">Service</span>
                                                        <div class="rating-bar">
                                                            <div class="rating-fill" style="width: 94%"></div>
                                                        </div>
                                                        <span class="rating-value">4.7</span>
                                                    </div>
                                                    <div class="rating-item">
                                                        <span class="rating-label">Location</span>
                                                        <div class="rating-bar">
                                                            <div class="rating-fill" style="width: 96%"></div>
                                                        </div>
                                                        <span class="rating-value">4.8</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-8">
                                            <div class="reviews-list">
                                                <div class="review-item">
                                                    <div class="reviewer-info">
                                                        <img src="/images/person-f-3.webp" alt="Sarah M."
                                                            class="reviewer-avatar">
                                                        <div class="reviewer-details">
                                                            <h5>Sarah M.</h5>
                                                            <div class="review-stars">
                                                                <i class="bi bi-star-fill"></i>
                                                                <i class="bi bi-star-fill"></i>
                                                                <i class="bi bi-star-fill"></i>
                                                                <i class="bi bi-star-fill"></i>
                                                                <i class="bi bi-star-fill"></i>
                                                            </div>
                                                            <span class="review-date">March 15, 2024</span>
                                                        </div>
                                                    </div>
                                                    <p class="review-text">
                                                        "Absolutely stunning suite with breathtaking city views. The marble
                                                        bathroom was luxurious and the bed incredibly comfortable. Service
                                                        was impeccable throughout our stay."
                                                    </p>
                                                </div>

                                                <div class="review-item">
                                                    <div class="reviewer-info">
                                                        <img src="/images/person-m-7.webp" alt="Michael R."
                                                            class="reviewer-avatar">
                                                        <div class="reviewer-details">
                                                            <h5>Michael R.</h5>
                                                            <div class="review-stars">
                                                                <i class="bi bi-star-fill"></i>
                                                                <i class="bi bi-star-fill"></i>
                                                                <i class="bi bi-star-fill"></i>
                                                                <i class="bi bi-star-fill"></i>
                                                                <i class="bi bi-star-fill"></i>
                                                            </div>
                                                            <span class="review-date">February 28, 2024</span>
                                                        </div>
                                                    </div>
                                                    <p class="review-text">
                                                        "Perfect for our anniversary celebration. The suite exceeded our
                                                        expectations in every way. The private balcony was our favorite
                                                        feature."
                                                    </p>
                                                </div>

                                                <div class="review-item">
                                                    <div class="reviewer-info">
                                                        <img src="/images/person-f-11.webp" alt="Jessica L."
                                                            class="reviewer-avatar">
                                                        <div class="reviewer-details">
                                                            <h5>Jessica L.</h5>
                                                            <div class="review-stars">
                                                                <i class="bi bi-star-fill"></i>
                                                                <i class="bi bi-star-fill"></i>
                                                                <i class="bi bi-star-fill"></i>
                                                                <i class="bi bi-star-fill"></i>
                                                                <i class="bi bi-star"></i>
                                                            </div>
                                                            <span class="review-date">January 12, 2024</span>
                                                        </div>
                                                    </div>
                                                    <p class="review-text">
                                                        "Beautiful room with excellent amenities. The only minor issue was
                                                        the check-in process took longer than expected, but the staff made
                                                        up for it with exceptional service."
                                                    </p>
                                                </div>
                                            </div>
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

@push('scripts')
<script>


    const bookedRanges = @json($order);
    const disabledDates = [];

    bookedRanges.forEach(range => {
        let start = new Date(range.tanggal_masuk);
        const end = new Date(range.tanggal_keluar);

        while (start < end) {
            disabledDates.push(start.toISOString().split("T")[0]);
            start.setDate(start.getDate() + 1);
        }
    });

    const checkinInput = document.getElementById("checkin-date");
    const checkoutInput = document.getElementById("checkout-date");
    const dateError = document.getElementById("date-error");
    const submitBtn = document.getElementById("submit-btn");

    function validateDates() {
        const checkin = new Date(checkinInput.value);
        const checkout = new Date(checkoutInput.value);

        // Reset jika input kosong
        if (!checkinInput.value || !checkoutInput.value) {
            checkoutInput.style.borderColor = "";
            dateError.style.display = "none";
            submitBtn.disabled = false;
            return;
        }

        if (checkout <= checkin) {
            // invalid → merah + tampilkan error
            checkoutInput.style.borderColor = "red";
            dateError.style.display = "block";
            submitBtn.disabled = true;
        } else {
            // valid → reset merah + sembunyikan error
            checkoutInput.style.borderColor = "";
            dateError.style.display = "none";
            submitBtn.disabled = false;
        }
    }

    checkinInput.addEventListener("change", validateDates);
    checkoutInput.addEventListener("change", validateDates);
</script>
@endpush
