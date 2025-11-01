@extends('layouts/main')

@section('content')
    <!-- Hotel Hero Section -->
    <section id="hotel-hero" class="hotel-hero section dark-background">

      <div class="hero-content">
        <div class="hero-background">
          <video autoplay="" muted="" loop="" loading="lazy">
            <source src="media/video-6.mp4" type="video/mp4">
          </video>
          <div class="hero-overlay"></div>
        </div>

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-10">
              <div class="hero-text text-center" data-aos="fade-up" data-aos-delay="100">
                <h1>Luwihaja Hill</h1>
                <p class="hero-subtitle">"When Leisure Meets Nature"</p>

                <!-- <div class="hero-features" data-aos="fade-up" data-aos-delay="200">
                  <div class="feature-item">
                    <i class="bi bi-star-fill"></i>
                    <span>5-Star Luxury</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span>Prime Location</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-award-fill"></i>
                    <span>Award Winning</span>
                  </div>
                </div> -->
              </div>

              <!-- <div class="booking-card" data-aos="fade-up" data-aos-delay="300">
                <div class="card">
                  <div class="card-body">
                    <form action="" method="post">
                      <div class="row g-3">
                        <div class="col-xl-3">
                          <label for="checkin" class="form-label">Check-in</label>
                          <input type="date" class="form-control" id="checkin" name="checkin" required="">
                        </div>
                        <div class="col-xl-3">
                          <label for="checkout" class="form-label">Check-out</label>
                          <input type="date" class="form-control" id="checkout" name="checkout" required="">
                        </div>
                        <div class="col-xl-2">
                          <label for="guests" class="form-label">Guests</label>
                          <select class="form-select" id="guests" name="guests" required="">
                            <option value="">Select</option>
                            <option value="1">1 Guest</option>
                            <option value="2">2 Guests</option>
                            <option value="3">3 Guests</option>
                            <option value="4">4+ Guests</option>
                          </select>
                        </div>
                        <div class="col-xl-2">
                          <label for="rooms" class="form-label">Rooms</label>
                          <select class="form-select" id="rooms" name="rooms" required="">
                            <option value="">Select</option>
                            <option value="1">1 Room</option>
                            <option value="2">2 Rooms</option>
                            <option value="3">3+ Rooms</option>
                          </select>
                        </div>
                        <div class="col-xl-2">
                          <label class="form-label d-block">�</label>
                          <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-search"></i>
                            Search
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div> -->

              <div class="hero-actions" data-aos="fade-up" data-aos-delay="400">
                <a href="rooms.html" class="btn btn-light btn-lg">
                  <i class="bi bi-house-door"></i>
                  Lihat Produk
                </a>
              </div>

              <!-- <div class="hero-stats" data-aos="fade-up" data-aos-delay="500">
                <div class="stat-item">
                  <div class="stat-number">
                    <span data-purecounter-start="0" data-purecounter-end="250" data-purecounter-duration="2" class="purecounter"></span>+
                  </div>
                  <div class="stat-label">Luxury Rooms</div>
                </div>
                <div class="stat-item">
                  <div class="stat-number">
                    <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="2" class="purecounter"></span>+
                  </div>
                  <div class="stat-label">Years Experience</div>
                </div>
                <div class="stat-item">
                  <div class="stat-number">
                    <span data-purecounter-start="0" data-purecounter-end="98" data-purecounter-duration="2" class="purecounter"></span>%
                  </div>
                  <div class="stat-label">Guest Satisfaction</div>
                </div>
                <div class="stat-item">
                  <div class="stat-number">
                    <span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="2" class="purecounter"></span>/7
                  </div>
                  <div class="stat-label">Concierge Service</div>
                </div>
              </div> -->
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Hotel Hero Section -->

    <!-- About Home Section -->
    <section id="about-home" class="about-home section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center">

          <div class="col-lg-5" data-aos="fade-up" data-aos-delay="200">
            <div class="about-images">
              <div class="image-stack">
                <div class="image-main">
                  <img src="images/showcase-3.webp" alt="Heritage Hotel Exterior" class="img-fluid">
                </div>
                <div class="image-overlay">
                  <img src="images/room-8.webp" alt="Elegant Room Interior" class="img-fluid">
                </div>
              </div>
            </div>
          </div><!-- End About Images -->

          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">
            <div class="about-content">
              <div class="section-header">
                <h2>Selamat datang di Villa Air Luwihaja Hill</h2>
              </div>

              <p>Villa Air Luwihaja Hill adalah  sebuah destinasi penginapan istimewa yang dirancang untuk menyatukan kenyamanan modern dengan pesona alam yang asri. Kami menawarkan pengalaman menginap yang unik di mana Anda dapat beristirahat dengan tenang sambil menikmati pemandangan dan kesegaran aliran sungai jernih yang berada tepat di depan mata Anda</p>

              <div class="about-actions">
                <a href="/tentang-kami" class="btn-discover">
                  <span>Baca Selengkapnya</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>

            </div>
          </div><!-- End About Content -->

        </div>

      </div>

    </section><!-- /About Home Section -->

     <!-- Amenities Cards Section -->
    <section id="amenities-cards" class="amenities-cards section-gelap">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Kenapa Harus Menginap di Luwihaja Hill</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

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
                <div class="amenity-features">
                </div>
              </div>
            </div>
          </div><!-- End Amenity Item -->

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
                <div class="amenity-features">
                </div>
              </div>
            </div>
          </div><!-- End Amenity Item -->

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
                <div class="amenity-features">
                </div>
              </div>
            </div>
          </div><!-- End Amenity Item -->

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
                <div class="amenity-features">
                </div>
              </div>
            </div>
          </div><!-- End Amenity Item -->

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
                <div class="amenity-features">
                </div>
              </div>
            </div>
          </div><!-- End Amenity Item -->

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
                <div class="amenity-features">
                </div>
              </div>
            </div>
          </div><!-- End Amenity Item -->

        </div>
      </div>

    </section><!-- /Amenities Cards Section -->

     <!-- Offer Cards Section -->
    <section id="offer-cards" class="offer-cards section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Rekomendasi</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4">

          <div class="col-lg-4 col-md-6">
            <div class="offer-card" data-aos="zoom-in" data-aos-delay="200">
              <div class="offer-badge">
                <span class="discount">Sedang Diskon</span>
              </div>
              <div class="offer-image">
                <img src="images/showcase-3.webp" alt="Weekend Getaway" class="img-fluid">
              </div>
              <div class="offer-content">
                <h3>Paket Liburan Singkat</h3>
                <p>Lepaskan penat dengan paket akhir pekan eksklusif di Luwihaja Hill. Nikmati sarapan gratis untuk 2 orang, welcome drink, dan late check-out hingga jam 2 siang.</p>
                <div class="offer-details">
                  <div class="price-info">
                    <span class="original-price">Rp.1000.000 </span>
                    <span class="offer-price">Rp. 850.000</span>
                    <span class="per-night">/ malam</span>
                  </div>
                  <div class="validity">
                    <i class="bi bi-calendar-check"></i>
                    <span>Berlaku hingga 31 Des 2025</span>
                  </div>
                </div>
                <a href="#" class="btn-book">Pesan Sekarang</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="offer-card" data-aos="zoom-in" data-aos-delay="200">
              <div class="offer-badge">
                <span class="discount">Sedang Diskon</span>
              </div>
              <div class="offer-image">
                <img src="images/showcase-3.webp" alt="Weekend Getaway" class="img-fluid">
              </div>
              <div class="offer-content">
                <h3>Paket Liburan Singkat</h3>
                <p>Lepaskan penat dengan paket akhir pekan eksklusif di Luwihaja Hill. Nikmati sarapan gratis untuk 2 orang, welcome drink, dan late check-out hingga jam 2 siang.</p>
                <div class="offer-details">
                  <div class="price-info">
                    <span class="original-price">Rp.1000.000 </span>
                    <span class="offer-price">Rp. 850.000</span>
                    <span class="per-night">/ malam</span>
                  </div>
                  <div class="validity">
                    <i class="bi bi-calendar-check"></i>
                    <span>Berlaku hingga 31 Des 2025</span>
                  </div>
                </div>
                <a href="#" class="btn-book">Pesan Sekarang</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="offer-card" data-aos="zoom-in" data-aos-delay="200">
              <div class="offer-badge">
                <span class="discount">Sedang Diskon</span>
              </div>
              <div class="offer-image">
                <img src="images/showcase-3.webp" alt="Weekend Getaway" class="img-fluid">
              </div>
              <div class="offer-content">
                <h3>Paket Liburan Singkat</h3>
                <p>Lepaskan penat dengan paket akhir pekan eksklusif di Luwihaja Hill. Nikmati sarapan gratis untuk 2 orang, welcome drink, dan late check-out hingga jam 2 siang.</p>
                <div class="offer-details">
                  <div class="price-info">
                    <span class="original-price">Rp.1000.000 </span>
                    <span class="offer-price">Rp. 850.000</span>
                    <span class="per-night">/ malam</span>
                  </div>
                  <div class="validity">
                    <i class="bi bi-calendar-check"></i>
                    <span>Berlaku hingga 31 Des 2025</span>
                  </div>
                </div>
                <a href="#" class="btn-book">Pesan Sekarang</a>
              </div>
            </div>
          </div>

        </div>
      </div>

    </section><!-- /Offer Cards Section -->

    <!-- Rooms Showcase Section -->
    <section id="rooms-showcase" class="rooms-showcase section-gelap">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Akomodasi</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-6 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="room-showcase-card featured">
              <div class="room-hero-image">
                <img src="images/room-7.webp" alt="Presidential Suite" class="img-fluid">
                <div class="room-badge">Popular Choice</div>
                <div class="room-icons">
                  <span class="icon-item"><i class="bi bi-people"></i> 4</span>
                  <span class="icon-item"><i class="bi bi-house"></i> Suite</span>
                  <span class="icon-item"><i class="bi bi-star"></i> Luxury</span>
                </div>
              </div>
              <div class="room-info">
                <div class="room-header">
                  <h3>Family Room</h3>
                  <div class="rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                </div>
                <p class="room-excerpt">Kamar terluas kami yang dirancang untuk kenyamanan keluarga, menawarkan kapasitas hingga 4 orang dewasa dengan fasilitas paling lengkap untuk liburan yang sempurna.</p>
                <div class="room-amenities">
                  <i class="bi bi-wifi"></i>
                  <i class="bi bi-tv"></i>
                  <i class="bi bi-cup-hot"></i>
                  <i class="bi bi-snow"></i>
                  <i class="bi bi-telephone"></i>
                  <i class="bi bi-safe"></i>
                </div>
                <div class="room-bottom">
                  <div class="pricing-info">
                    <span class="price-tag">Rp. 700.000</span>
                    <span class="price-label">/ malam</span>
                  </div>
                  <a href="room-details.html" class="explore-btn">Pesan Sekarang</a>
                </div>
              </div>
            </div>
          </div><!-- End Featured Room Card -->

          <div class="col-lg-6">
            <div class="row">
              <div class="col-12 mb-4" data-aos="slide-left" data-aos-delay="250">
                <div class="room-showcase-card compact">
                  <div class="compact-image">
                    <img src="images/room-11.webp" alt="Executive Suite" class="img-fluid">
                    <div class="quick-view">
                      <i class="bi bi-eye"></i>
                    </div>
                  </div>
                  <div class="compact-content">
                    <h4>Super Duluxe</h4>
                    <p>Ideal untuk grup kecil, kamar ini memadukan kenyamanan dengan pemandangan sungai yang menenangkan untuk 3 orang.</p>
                    <div class="compact-features">
                      <span><i class="bi bi-briefcase"></i> Work Desk</span>
                      <span><i class="bi bi-building"></i> City View</span>
                    </div>
                    <div class="compact-bottom">
                      <span class="compact-price">Rp. 1.300.000<small> / malam</small></span>
                      <a href="room-details.html" class="quick-book">Pesan Sekarang</a>
                    </div>
                  </div>
                </div>
              </div><!-- End Compact Room Card -->

              <div class="col-12 mb-4" data-aos="slide-left" data-aos-delay="300">
                <div class="room-showcase-card compact">
                  <div class="compact-image">
                    <img src="images/room-16.webp" alt="Ocean View" class="img-fluid">
                    <div class="quick-view">
                      <i class="bi bi-eye"></i>
                    </div>
                  </div>
                  <div class="compact-content">
                    <h4>Duluxe Bed</h4>
                    <p>Nikmati pengalaman glamping modern yang nyaman untuk 2 orang dengan akses langsung ke jernihnya air sungai</p>
                    <div class="compact-features">
                      <span><i class="bi bi-water"></i> Ocean View</span>
                      <span><i class="bi bi-tree"></i> Balcony</span>
                    </div>
                    <div class="compact-bottom">
                      <span class="compact-price">Rp. 1.000.000<small> / malam</small></span>
                      <a href="room-details.html" class="quick-book">Pesan Sekarang</a>
                    </div>
                  </div>
                </div>
              </div><!-- End Compact Room Card -->

              <div class="col-12 mb-4" data-aos="slide-left" data-aos-delay="350">
                <div class="room-showcase-card compact">
                  <div class="compact-image">
                    <img src="images/room-9.webp" alt="Family Room" class="img-fluid">
                    <div class="quick-view">
                      <i class="bi bi-eye"></i>
                    </div>
                  </div>
                  <div class="compact-content">
                    <h4>Twin Bed</h4>
                    <p>Pilihan tepat untuk Anda yang bepergian bersama teman, menawarkan dua tempat tidur terpisah dengan semua fasilitas esensial.</p>
                    <div class="compact-features">
                      <span><i class="bi bi-door-open"></i> Connected</span>
                      <span><i class="bi bi-controller"></i> Entertainment</span>
                    </div>
                    <div class="compact-bottom">
                      <span class="compact-price">Rp. 900.000<small> / malam</small></span>
                      <a href="room-details.html" class="quick-book">Pesan Sekarang</a>
                    </div>
                  </div>
                </div>
              </div><!-- End Compact Room Card -->
            </div>
          </div>
        </div>
        </div>

        <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="600">
          <a href="/akomodasi" class="discover-all-btn">Lihat Semua Akomodasi</a>
        </div>

      </div>

    </section><!-- /Rooms Showcase Section -->

     <!-- Events Cards Section -->
    <section id="events-cards" class="events-cards section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Fasilitas</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

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
          </div><!-- End Event Card -->

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
          </div><!-- End Event Card -->

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
          </div><!-- End Event Card -->

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
          </div><!-- End Event Card -->

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
          </div><!-- End Event Card -->

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
          </div><!-- End Event Card -->

        </div>

      </div>

    </section><!-- /Events Cards Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section-gelap">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimoni</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

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

            <!-- Testimonial Slide 1 -->
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
            </div><!-- End Testimonial Slide -->

            <!-- Testimonial Slide 2 -->
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
            </div><!-- End Testimonial Slide -->

            <!-- Testimonial Slide 3 -->
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
            </div><!-- End Testimonial Slide -->

            <!-- Testimonial Slide 4 -->
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
            </div><!-- End Testimonial Slide -->

            <!-- Testimonial Slide 5 -->
            <div class="swiper-slide">
              <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="600">
                <div class="testimonial-header">
                  <img src="images/person-f-10.webp" alt="Client" class="img-fluid" loading="lazy">
                  <div class="rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                </div>
                <div class="testimonial-body">
                  <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi.</p>
                </div>
                <div class="testimonial-footer">
                  <h5>Rachel Chen</h5>
                  <span>Project Manager</span>
                  <div class="quote-icon">
                    <i class="bi bi-chat-quote-fill"></i>
                  </div>
                </div>
              </div>
            </div><!-- End Testimonial Slide -->

          </div>

          <div class="swiper-navigation">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>

        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <section id="faq" class="faq section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>FAQ</h2>
          <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item rounded mb-5">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#one" aria-expanded="false" aria-controls="one">
                      Accordion Item #1
                    </button>
                  </h2>
                  <div id="one" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong>This is the second item’s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                  </div>
                </div>
                <div class="accordion-item rounded mb-5">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#two" aria-expanded="false" aria-controls="two">
                      Accordion Item #2
                    </button>
                  </h2>
                  <div id="two" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong>This is the second item’s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                  </div>
                </div>
                <div class="accordion-item rounded mb-5">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#three" aria-expanded="false" aria-controls="three">
                      Accordion Item #3
                    </button>
                  </h2>
                  <div id="three" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <strong>This is the second item’s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                  </div>
                </div>
        </div>
    </section>

    <!-- Location Section -->
    <section id="lokasi" class="hotel-location section-gelap">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Lokasi</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">

          <!-- Map Section -->
          <div class="col-lg-8 mb-5 mb-lg-0" data-aos="fade-right" data-aos-delay="200">
            <div class="map-wrapper" style="height: 100%">
              <iframe style="height: 100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.0266070980883!2d106.95231537453701!3d-6.643617764945126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69b7981e20e2fb%3A0x8095edcccc6da80d!2sVilla%20dan%20Cafe%20Air%20Luwihaja%20Hill!5e0!3m2!1sid!2sid!4v1761913874506!5m2!1sid!2sid" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>

          <!-- Location Info -->
          <div class="col-lg-4" data-aos="fade-left" data-aos-delay="300">
            <div class="location-info mb-3">
              <div class="address-block">
                <h5><i class="bi bi-geo-alt"></i> Alamat</h5>
                <p>Jl. Tegal Luhur, Paseban,<br>Kec. Megamendung, Kabupaten Bogor<br>Jawa Barat 16770</p>
              </div>
            </div>
            <div class="location-info">
              <h3>Also Find Me On</h3>

              <div class="address-block">
                <h5><img src="/images/tiket-com.png" height="20px"> Tiket.com</h5>
                <p>456 Broadway Avenue<br>New York, NY 10013<br>United States</p>
              </div>

              <div class="transport-info">
                <h5><i class="bi bi-airplane"></i> Airport Distance</h5>
                <p>John F. Kennedy Airport - 45 minutes by car</p>
                <p>LaGuardia Airport - 30 minutes by car</p>
              </div>

              <div class="contact-info">
                <h5><i class="bi bi-telephone"></i> Contact</h5>
                <p>Phone: +1 (555) 234-5678</p>
                <p>Email: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="c4adaaa2ab84a1bca5a9b4a8a1eaa7aba9">[email�protected]</a></p>
              </div>

              <a href="#" class="btn btn-primary">Get Directions</a>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- Call To Action Section -->
    <!-- <section id="call-to-action" class="call-to-action section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="cta-content text-center">
              <div class="row align-items-center">
                <div class="col-lg-8">
                  <div class="text-content">
                    <h2>Experience Luxury Like Never Before</h2>
                    <p class="lead mb-0">Book your dream getaway today and enjoy exclusive amenities, world-class service, and unforgettable memories. Limited availability for our premium suites.</p>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="cta-action" data-aos="zoom-in" data-aos-delay="200">
                    <a href="booking.html" class="btn btn-cta">
                      <i class="bi bi-calendar-check me-2"></i>
                      Book Now
                    </a>
                    <div class="offer-badge" data-aos="fade-up" data-aos-delay="300">
                      <span>Save up to 25%</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row mt-5" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="feature-item text-center">
              <div class="icon-wrapper">
                <i class="bi bi-shield-check"></i>
              </div>
              <h5>Free Cancellation</h5>
              <p>Cancel up to 24 hours before check-in</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="feature-item text-center">
              <div class="icon-wrapper">
                <i class="bi bi-award"></i>
              </div>
              <h5>Best Rate Guarantee</h5>
              <p>We'll match any lower rate you find</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="feature-item text-center">
              <div class="icon-wrapper">
                <i class="bi bi-headset"></i>
              </div>
              <h5>24/7 Support</h5>
              <p>Round-the-clock customer assistance</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="feature-item text-center">
              <div class="icon-wrapper">
                <i class="bi bi-lock"></i>
              </div>
              <h5>Secure Booking</h5>
              <p>Your payment information is protected</p>
            </div>
          </div>
        </div>

      </div>

    </section>/Call To Action Section -->

    <!-- Location Cards Section -->
    <!-- <section id="location-cards" class="location-cards section"> -->

      <!-- Section Title -->
      <!-- <div class="container section-title" data-aos="fade-up">
        <h2>Location & Activities</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div> -->
      <!-- End Section Title -->

      <!-- <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="location-card">
              <img src="images/location-1.webp" alt="Local Attractions" class="img-fluid location-image">
              <div class="location-content">
                <div class="location-icon">
                  <i class="bi bi-geo-alt"></i>
                </div>
                <h4>Museums & Culture</h4>
                <p>Explore world-class museums and cultural landmarks just minutes from your doorstep. From contemporary art to historical exhibitions.</p>
                <ul class="nearby-places">
                  <li><i class="bi bi-dot"></i> Metropolitan Museum - 0.8 miles</li>
                  <li><i class="bi bi-dot"></i> Art Gallery District - 1.2 miles</li>
                  <li><i class="bi bi-dot"></i> Cultural Center - 0.5 miles</li>
                </ul>
                <a href="location.html" class="explore-btn">Explore Area</a>
              </div>
            </div>
          </div> -->
          <!-- End Location Card -->

          <!-- <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="location-card">
              <img src="images/location-2.webp" alt="Shopping District" class="img-fluid location-image">
              <div class="location-content">
                <div class="location-icon">
                  <i class="bi bi-bag-check"></i>
                </div>
                <h4>Shopping & Dining</h4>
                <p>Indulge in premier shopping and culinary experiences. From boutique stores to award-winning restaurants in the entertainment district.</p>
                <ul class="nearby-places">
                  <li><i class="bi bi-dot"></i> Grand Shopping Mall - 0.3 miles</li>
                  <li><i class="bi bi-dot"></i> Restaurant Row - 0.6 miles</li>
                  <li><i class="bi bi-dot"></i> Night Market - 0.9 miles</li>
                </ul>
                <a href="location.html" class="explore-btn">View Restaurants</a>
              </div>
            </div>
          </div> -->
          <!-- End Location Card -->

          <!-- <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="location-card">
              <img src="images/location-10.webp" alt="Business District" class="img-fluid location-image">
              <div class="location-content">
                <div class="location-icon">
                  <i class="bi bi-building"></i>
                </div>
                <h4>Business Hub</h4>
                <p>Strategically located in the heart of the financial district. Perfect for business travelers with easy access to corporate centers.</p>
                <ul class="nearby-places">
                  <li><i class="bi bi-dot"></i> Convention Center - 0.4 miles</li>
                  <li><i class="bi bi-dot"></i> Financial District - 0.7 miles</li>
                  <li><i class="bi bi-dot"></i> Business Park - 1.1 miles</li>
                </ul>
                <a href="location.html" class="explore-btn">Business Services</a>
              </div>
            </div>
          </div> -->
          <!-- End Location Card -->

        <!-- </div>

      </div>

    </section> -->
    <!-- /Location Cards Section -->

    <!-- Gallery Showcase Section -->
    <!-- <section id="gallery-showcase" class="gallery-showcase section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="gallery-carousel swiper init-swiper" data-aos="fade-up" data-aos-delay="200">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 3000
              },
              "slidesPerView": 1,
              "spaceBetween": 20,
              "centeredSlides": true,
              "breakpoints": {
                "576": {
                  "slidesPerView": 2,
                  "centeredSlides": false
                },
                "768": {
                  "slidesPerView": 3,
                  "centeredSlides": false
                },
                "992": {
                  "slidesPerView": 4,
                  "centeredSlides": false
                },
                "1200": {
                  "slidesPerView": 5,
                  "centeredSlides": false
                }
              }
            }
          </script>
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="gallery-item">
                <img src="images/gallery-1.webp" alt="Luxurious Suite" class="img-fluid" loading="lazy">
                <a href="assets/img/hotel/gallery-1.webp" class="gallery-overlay glightbox">
                  <i class="bi bi-eye"></i>
                </a>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="gallery-item">
                <img src="images/gallery-5.webp" alt="Modern Lobby" class="img-fluid" loading="lazy">
                <a href="assets/img/hotel/gallery-5.webp" class="gallery-overlay glightbox">
                  <i class="bi bi-eye"></i>
                </a>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="gallery-item">
                <img src="images/gallery-12.webp" alt="Elegant Dining Area" class="img-fluid" loading="lazy">
                <a href="assets/img/hotel/gallery-12.webp" class="gallery-overlay glightbox">
                  <i class="bi bi-eye"></i>
                </a>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="gallery-item">
                <img src="images/gallery-8.webp" alt="Grand Ballroom Setup" class="img-fluid" loading="lazy">
                <a href="assets/img/hotel/gallery-8.webp" class="gallery-overlay glightbox">
                  <i class="bi bi-eye"></i>
                </a>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="gallery-item">
                <img src="images/gallery-15.webp" alt="Relaxing Poolside" class="img-fluid" loading="lazy">
                <a href="assets/img/hotel/gallery-15.webp" class="gallery-overlay glightbox">
                  <i class="bi bi-eye"></i>
                </a>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="gallery-item">
                <img src="images/gallery-3.webp" alt="Cozy Guest Room" class="img-fluid" loading="lazy">
                <a href="assets/img/hotel/gallery-3.webp" class="gallery-overlay glightbox">
                  <i class="bi bi-eye"></i>
                </a>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="gallery-item">
                <img src="images/gallery-18.webp" alt="Spa and Wellness Center" class="img-fluid" loading="lazy">
                <a href="assets/img/hotel/gallery-18.webp" class="gallery-overlay glightbox">
                  <i class="bi bi-eye"></i>
                </a>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="gallery-item">
                <img src="images/gallery-7.webp" alt="Conference Facilities" class="img-fluid" loading="lazy">
                <a href="assets/img/hotel/gallery-7.webp" class="gallery-overlay glightbox">
                  <i class="bi bi-eye"></i>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="300">
          <a href="gallery.html" class="btn btn-gallery">
            <i class="bi bi-collection me-2"></i>Discover Our Full Gallery
          </a>
        </div>

      </div>

    </section> -->
    <!-- /Gallery Showcase Section -->
@endsection
