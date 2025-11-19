@extends('layouts/main')

@section('content')
    <!-- Hero Home Section -->
    <section id="hero" class="hotel-hero section dark-background">
        <div class="hero-content">
            <div class="hero-background">
                <image src="/images/hero.jpg" style="object-fit: cover" width="100%" height="100%"></image>
                <div class="hero-overlay"></div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                    <div class="hero-text text-center" data-aos="fade-up" data-aos-delay="100">
                        <h1>Luwihaja Hill</h1>
                        <p class="hero-subtitle">"When Leisure Meets Nature"</p>
                    </div>
                    <div class="hero-actions" data-aos="fade-up" data-aos-delay="400">
                        <a href="/akomodasi" class="btn btn-light btn-lg"><i class="bi bi-house-door"></i>Lihat Produk</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Home Section -->
    <section id="about" class="about-home section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row align-items-center">
                <div class="col-lg-5" data-aos="fade-up" data-aos-delay="200">
                    <div class="about-images">
                        <div class="image-stack">
                            <div class="image-main">
                                <img src="/images/tentangkami1.jpg" alt="tentangkami1" class="img-fluid">
                            </div>
                            <div class="image-overlay">
                                <img src="images/tentangkami2.jpg" alt="tentangkami2" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">
                    <div class="about-content">
                        <div class="section-header">
                            <h2>Selamat datang di Villa Air Luwihaja Hill</h2>
                        </div>
                        <p>Villa Air Luwihaja Hill adalah  sebuah destinasi penginapan istimewa yang dirancang untuk menyatukan kenyamanan modern dengan pesona alam yang asri. Kami menawarkan pengalaman menginap yang unik di mana Anda dapat beristirahat dengan tenang sambil menikmati pemandangan dan kesegaran aliran sungai jernih yang berada tepat di depan mata Anda</p>
                        <div class="about-actions">
                            <a href="/tentang-kami" class="btn-discover"><span>Baca Selengkapnya</span><i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kenapa Harus Section -->
    <section id="kenapa" class="amenities-cards section-gelap">
        <div class="container section-title" data-aos="fade-up">
            <h2>Kenapa Harus Menginap di Luwihaja Hill</h2>
            <p>Perpaduan unik antara kenyamanan modern dan ketenangan alam yang menjadikan kami pilihan istimewa untuk liburan Anda</p>
        </div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-5">
                <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="amenity-card">
                        <div class="card-header">
                            <div class="amenity-icon">
                                <i class="bi bi-water"></i>
                            </div>
                            <h4>View Alam & Sungai Jernih</h4>
                        </div>
                        <div class="amenity-content">
                            <p>Nikmati pemandangan langsung ke sungai yang jernih, lengkap dengan pengalaman mandi di aliran air alami yang menyegarkan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="amenity-card">
                        <div class="card-header">
                            <div class="amenity-icon">
                                <i class="bi bi-heart-pulse"></i>
                            </div>
                            <h4>Fasilitas Nyaman & Lengkap</h4>
                        </div>
                        <div class="amenity-content">
                            <p>Handuk, sandal hotel, amenities, kamar mandi dalam dengan water heater, hingga beberapa unit dengan mini kitchen.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="400">
                    <div class="amenity-card">
                        <div class="card-header">
                            <div class="amenity-icon">
                                <i class="bi bi-cup-hot"></i>
                            </div>
                            <h4>Welcome Drink & Breakfast Gratis</h4>
                        </div>
                        <div class="amenity-content">
                            <p>Setiap tamu akan mendapat welcome drink spesial serta sarapan gratis untuk 2 orang.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="500">
                    <div class="amenity-card">
                        <div class="card-header">
                            <div class="amenity-icon">
                                <i class="bi bi-bicycle"></i>
                            </div>
                            <h4>Free WiFi & Minuman Hangat</h4>
                        </div>
                        <div class="amenity-content">
                            <p>Tersedia WiFi gratis, kopi, teh, dan air mineral sepuasnya, plus teko elektrik untuk air panas.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="amenity-card">
                        <div class="card-header">
                            <div class="amenity-icon">
                                <i class="bi bi-wifi"></i>
                            </div>
                            <h4> Area Api Unggun & Aktivitas Seru</h4>
                        </div>
                        <div class="amenity-content">
                            <p>Serunya berkumpul di area api unggun, mencoba tubing di sungai, atau sekadar bersantai di gazebo dengan keluarga/teman.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="amenity-card">
                        <div class="card-header">
                            <div class="amenity-icon">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <h4>Cafe & Mini Market</h4>
                        </div>
                        <div class="amenity-content">
                            <p>Tersedia cafe dengan suasana alam yang nyaman serta mini market untuk kebutuhan praktis selama menginap.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Rekomendasi Section -->
    <section id="rekomendasi" class="offer-cards section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Rekomendasi</h2>
            <p>Manfaatkan penawaran dan paket spesial kami untuk liburan yang lebih hemat dan berkesan di Luwihaja Hill</p>
        </div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-4">
                @foreach ($rekomendasi->take(3) as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="offer-card" data-aos="zoom-in" data-aos-delay="200">
                        @if ($item->harga_diskon != null)
                        <div class="offer-badge">
                            <span class="discount">Sedang Diskon</span>
                        </div>
                        @endif
                        <div class="offer-image">
                            <img src="{{ $item->gambar }}" alt="Weekend Getaway" class="img-fluid">
                        </div>
                        <div class="offer-content">
                            <h3>{{ $item->tipe }}</h3>
                            <p>{{ $item->deskripsi }}</p>
                            <div class="offer-details">
                                <div class="price-info">
                                    @if ($item->harga_diskon != null)
                                    <span class="original-price">{{ @currency($item->harga_asli) }}</span>
                                    <span class="offer-price">{{ @currency($item->harga_diskon) }}</span>
                                    <span class="per-night">/ malam</span>
                                    @else
                                    <span class="offer-price">{{ @currency($item->harga_asli) }}</span>
                                    <span class="per-night">/ malam</span>
                                    @endif
                                </div>
                            </div>
                            <a href="/akomodasi/{{ $item->id }}" class="btn-book">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Akomodasi Section -->
    <section id="rooms-showcase" class="rooms-showcase section-gelap">
        <div class="container section-title" data-aos="fade-up">
            <h2>Akomodasi</h2>
            <p>Temukan berbagai jenis kamar dengan fasilitas terbaik untuk pengalaman menginap yang tak terlupakan.</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                @foreach($akomodasi as $index => $item)
                    @if($index === 0)
                        <div class="col-lg-6 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="200">
                            <div class="room-showcase-card featured">
                                <div class="room-hero-image">
                                    <img src="{{ $item->gambar }}" alt="{{ $item->tipe }}" class="img-fluid" style="aspect-ratio: 1 / 1; object-fit: cover;">
                                </div>
                                <div class="room-info">
                                    <div class="room-header">
                                        <h3>{{ $item->tipe }}</h3>
                                        <div class="rating">
                                            @for($i = 0; $i < 5; $i++)
                                                <i class="bi bi-star-fill"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="room-excerpt">{{ $item->deskripsi }}</p>
                                    <div class="room-amenities">
                                        <span><i class="bi bi-people"></i>{{ $item->jumlah_tamu }} Tamu</span>
                                        <span><i class="bi bi-moon"></i>{{ $item->tipe_kasur }} Bed</span>
                                        <span><i class="bi bi-house"></i>{{ $item->luas }} m²</span>
                                    </div>
                                    <div class="room-bottom">
                                        <div class="pricing-info">
                                            <span class="price-tag">
                                                {{ $item->harga_diskon != null ? @currency($item->harga_diskon) : @currency($item->harga_asli) }}
                                            </span>
                                            <span class="price-label">/ malam</span>
                                        </div>
                                        <a href="{{ url('/akomodasi/'.$item->id) }}" class="explore-btn">Pesan Sekarang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

                <div class="col-lg-6">
                    <div class="row">
                        @foreach($akomodasi->skip(1)->take(3) as $index => $item)
                            <div class="col-12 mb-4" data-aos="slide-left" data-aos-delay="{{ 250 + $index * 50 }}">
                                <div class="room-showcase-card compact">
                                    <div class="compact-image">
                                        <img src="{{ $item->gambar }}" alt="{{ $item->tipe }}" class="img-fluid" style="aspect-ratio: 1 / 1; object-fit: cover;">
                                    </div>
                                    <div class="compact-content">
                                        <h4>{{ $item->tipe }}</h4>
                                        <p>{{ Str::limit($item->deskripsi, 120) }}</p>
                                        <div class="compact-features">
                                            <span><i class="bi bi-people"></i> {{ $item->jumlah_tamu }} Tamu</span>
                                            <span><i class="bi bi-moon"></i> {{ $item->tipe_kasur }} Bed</span>
                                            <span><i class="bi bi-house"></i> {{ $item->luas }} m²</span>
                                        </div>
                                        <div class="compact-bottom">
                                            <span class="compact-price">
                                                {{ $item->harga_diskon != null ? @currency($item->harga_diskon) : @currency($item->harga_asli) }}
                                                <small> / malam</small>
                                            </span>
                                            <a href="/akomodasi/{{ $item->id }}" class="quick-book">Pesan Sekarang</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="600">
            <a href="/akomodasi" class="discover-all-btn">Lihat Semua Akomodasi</a>
        </div>
    </section>

    <!-- Fasilitas Section -->
    <section id="fasilitas" class="events-cards section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Fasilitas</h2>
            <p>Lengkapi pengalaman menginap Anda dengan beragam fasilitas, mulai dari kafe, area api unggun, hingga akses pemandian sungai</p>
        </div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="event-card" data-aos="zoom-in" data-aos-delay="100">
                        <div class="event-image">
                            <img src="images/event-6.webp" alt="Wedding Celebration" class="img-fluid">
                            <div class="event-overlay">
                                <h4>Cafe Air</h4>
                                <p>Nikmati hidangan lezat dan minuman segar di Cafe Air kami yang asri.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="event-card" data-aos="zoom-in" data-aos-delay="200">
                        <div class="event-image">
                            <img src="images/event-3.webp" alt="Corporate Events" class="img-fluid">
                            <div class="event-overlay">
                                <h4>Pemandian Cafe Air</h4>
                                <p>Rasakan kesegaran alami air sungai jernih yang mengalir di area kami.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="event-card" data-aos="zoom-in" data-aos-delay="300">
                        <div class="event-image">
                            <img src="images/event-7.webp" alt="Private Celebrations" class="img-fluid">
                            <div class="event-overlay">
                                <h4>Kenz Mart</h4>
                                <p>Penuhi kebutuhan ringan dan camilan Anda dengan praktis di Kenz Mart kami</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="event-card" data-aos="zoom-in" data-aos-delay="100">
                        <div class="event-image">
                            <img src="images/event-2.webp" alt="Conference Facilities" class="img-fluid">
                            <div class="event-overlay">
                                <h4>Musholla</h4>
                                <p>Kenyamanan beribadah di tengah suasana alam yang tenang.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="event-card" data-aos="zoom-in" data-aos-delay="200">
                        <div class="event-image">
                            <img src="images/event-9.webp" alt="Social Gatherings" class="img-fluid">
                            <div class="event-overlay">
                                <h4>Api Unggun</h4>
                                <p>Ciptakan momen hangat dan akrab di bawah bintang-bintang.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="event-card" data-aos="zoom-in" data-aos-delay="300">
                        <div class="event-image">
                            <img src="images/event-10.webp" alt="Corporate Retreats" class="img-fluid">
                            <div class="event-overlay">
                                <h4>Tubing Air</h4>
                                <p>Bukan hanya untuk berenang, nikmati juga pengalaman seru mencoba wahana tubing di aliran sungai kami yang menantang</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni Section -->
    <section id="testimonials" class="testimonials section-gelap">
        <div class="container section-title" data-aos="fade-up">
            <h2>Testimoni</h2>
            <p>Dengarkan pengalaman dan cerita dari para tamu yang telah menikmati waktu mereka bersama kami</p>
        </div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="testimonial-slider swiper init-swiper">
                <script type="application/json" class="swiper-config">
                    {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                        "delay": 4000
                    },
                    "slidesPerView": 1,
                    "spaceBetween": 30,
                    "navigation": {
                        "nextEl": ".swiper-button-next",
                        "prevEl": ".swiper-button-prev"
                    },
                    "breakpoints": {
                        "768": {
                        "slidesPerView": 2
                        },
                        "1200": {
                        "slidesPerView": 3
                        }
                    }
                    }
                </script>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="200">
                            <div class="testimonial-header">
                                <img src="images/person-f-12.webp" alt="Client" class="img-fluid" loading="lazy">
                                <div class="rating">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                            </div>
                            <div class="testimonial-body">
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit sed eiusmod tempor.</p>
                            </div>
                            <div class="testimonial-footer">
                                <h5>Jessica Martinez</h5>
                                <span>UX Designer</span>
                                <div class="quote-icon">
                                    <i class="bi bi-chat-quote-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="300">
                            <div class="testimonial-header">
                                <img src="images/person-m-8.webp" alt="Client" class="img-fluid" loading="lazy">
                                <div class="rating">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                            </div>
                            <div class="testimonial-body">
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat non proident sunt in culpa.</p>
                            </div>
                            <div class="testimonial-footer">
                                <h5>David Rodriguez</h5>
                                <span>Software Engineer</span>
                                <div class="quote-icon">
                                    <i class="bi bi-chat-quote-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="400">
                            <div class="testimonial-header">
                                <img src="images/person-f-6.webp" alt="Client" class="img-fluid" loading="lazy">
                                <div class="rating">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                            </div>
                            <div class="testimonial-body">
                                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam quis nostrud.</p>
                            </div>
                            <div class="testimonial-footer">
                                <h5>Amanda Wilson</h5>
                                <span>Creative Director</span>
                                <div class="quote-icon">
                                    <i class="bi bi-chat-quote-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="500">
                            <div class="testimonial-header">
                                <img src="images/person-m-12.webp" alt="Client" class="img-fluid" loading="lazy">
                                <div class="rating">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                            </div>
                            <div class="testimonial-body">
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam eaque ipsa quae ab illo inventore veritatis.</p>
                            </div>
                            <div class="testimonial-footer">
                                <h5>Ryan Thompson</h5>
                                <span>Business Analyst</span>
                                <div class="quote-icon">
                                    <i class="bi bi-chat-quote-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-navigation">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="faq section">
        <div class="container section-title" data-aos="fade-up">
            <h2>FAQ</h2>
            <p>Punya pertanyaan? Temukan jawaban cepat untuk hal-hal yang sering ditanyakan di sini</p>
        </div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="accordion" id="accordionExample">
                @foreach ($faq as $item)
                <div class="accordion-item rounded mb-5">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $item->id }}" aria-expanded="false" aria-controls="{{ $item->id }}">
                        {{ $item->pertanyaan }}
                        </button>
                    </h2>
                    <div id="{{ $item->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        {{ $item->jawaban }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Location Section -->
    <section id="lokasi" class="hotel-location section-gelap">
        <div class="container section-title" data-aos="fade-up">
            <h2>Lokasi</h2>
            <p>Kami berlokasi strategis di Megamendung, Bogor. Lihat peta dan kontak kami untuk informasi lebih lanjut</p>
        </div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0" data-aos="fade-right" data-aos-delay="200">
                    <div class="map-wrapper" style="height: 100%">
                        <iframe style="height: 100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.0266070980883!2d106.95231537453701!3d-6.643617764945126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69b7981e20e2fb%3A0x8095edcccc6da80d!2sVilla%20dan%20Cafe%20Air%20Luwihaja%20Hill!5e0!3m2!1sid!2sid!4v1761913874506!5m2!1sid!2sid" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-left" data-aos-delay="300">
                    <div class="location-info mb-3">
                        <div class="address-block">
                            <h5><i class="bi bi-geo-alt"></i> Alamat</h5>
                            <p>Jl. Tegal Luhur, Paseban, Kec. Megamendung, Kabupaten Bogor Jawa Barat 16770</p>
                        </div>
                    </div>
                    <div class="location-info">
                        <h3>Informasi Kami</h3>
                        <div class="contact-info">
                            <h5><i class="bi bi-telephone"></i>Kontak</h5>
                            <p>No. Telepopn: +62 821-1555-1822</p>
                            <p>Email: luwihajahill@gmail.com</p>
                            <p>Instagram: @villadancafeair</p>
                        </div>
                        <div class="address-block my-3">
                            <img src="https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/original/test-discovery/2024/03/01/ac13e03e-896c-4bbb-ba7c-cdf9b04a68b7-1709290197088-cb26aa8c25b24b1aa5df8bb2edce7ea7.png" class="img-fluid" width="30%" alt="">
                            <br>
                            {{-- <h5>Tiket.com</h5> --}}
                            <a href="https://en.tiket.com/homes/indonesia/villa-dan-cafe-air-luwihajahill-509001662365722026" class="btn btn-primary mt-3" target="_blank">Lihat tiket.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
