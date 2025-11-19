@extends('layouts/main')

@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(/images/header.jpg);">
      <div class="container position-relative">
        <h1>Detail Akomodasi</h1>
        <p>Jelajahi detail fasilitas modern dan pemandangan alam menenangkan yang kami siapkan untuk pengalaman menginap Anda yang tak terlupakan.</p>
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
                <img id="main-product-image" src="{{ $akomodasi->gambar }}" alt="{{ $akomodasi->tipe }}" class="img-fluid main-room-image" data-zoom="{{ $akomodasi->gambar }}">
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
                <p class="price-note" style="text-decoration: line-through">{{ @currency($akomodasi->harga_asli) }} / malam</p>
                @endif
                <div class="price-value">
                  <span class="amount">{{ $akomodasi->harga_diskon ? @currency($akomodasi->harga_diskon) : @currency($akomodasi->harga_asli) }}</span>
                  <span class="period"> / malam</span>
                </div>
                <p class="price-note">*Pajak dan biaya lain tidak termasuk</p>
              </div>

              <div class="booking-form">
                <form action="" method="post">
                  <div class="row">
                    <div class="col-12 mb-3">
                      <label for="checkin-date" class="form-label">Tanggal Masuk</label>
                      <input type="date" class="form-control" id="checkin-date" name="checkin" required="">
                    </div>
                    <div class="col-12 mb-3">
                      <label for="checkout-date" class="form-label">Tanggal Keluar</label>
                      <input type="date" class="form-control" id="checkout-date" name="checkout" required="">
                    </div>
                  </div>
                  <a href="/booking" type="submit" class="btn btn-primary btn-book">
                    <i class="bi bi-calendar-check me-2"></i>
                    Pesan Sekarang
                  </a>
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
                  <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#room-details-overview" type="button" role="tab">Overview</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#room-details-reviews" type="button" role="tab">Reviews</button>
                </li>
              </ul>

              <div class="tab-content mt-4" id="roomTabsContent">
                <div class="tab-pane fade show active" id="room-details-overview" role="tabpanel">
                  <div class="row">
                    <div class="col-lg-8">
                      <h3> Deskripsi Kamar</h3>
                      <p class="room-description">
                        {{ $akomodasi->deskripsi }}
                      </p>

                      <div class="room-features-grid mt-4">
                        <div class="feature-item">
                          <i class="bi bi-people"></i>
                          <div class="feature-info">
                            <h5>Max Occupancy</h5>
                            <p>4 Guests</p>
                          </div>
                        </div>
                        <div class="feature-item">
                          <i class="bi bi-arrows-fullscreen"></i>
                          <div class="feature-info">
                            <h5>Room Size</h5>
                            <p>85 sqm</p>
                          </div>
                        </div>
                        <div class="feature-item">
                          <i class="bi bi-moon"></i>
                          <div class="feature-info">
                            <h5>Bed Type</h5>
                            <p>King Bed</p>
                          </div>
                        </div>
                        <div class="feature-item">
                          <i class="bi bi-eye"></i>
                          <div class="feature-info">
                            <h5>View</h5>
                            <p>City Skyline</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="room-stats">
                        <h4>Quick Stats</h4>
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
                              <img src="/images/person-f-3.webp" alt="Sarah M." class="reviewer-avatar">
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
                              "Absolutely stunning suite with breathtaking city views. The marble bathroom was luxurious and the bed incredibly comfortable. Service was impeccable throughout our stay."
                            </p>
                          </div>

                          <div class="review-item">
                            <div class="reviewer-info">
                              <img src="/images/person-m-7.webp" alt="Michael R." class="reviewer-avatar">
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
                              "Perfect for our anniversary celebration. The suite exceeded our expectations in every way. The private balcony was our favorite feature."
                            </p>
                          </div>

                          <div class="review-item">
                            <div class="reviewer-info">
                              <img src="/images/person-f-11.webp" alt="Jessica L." class="reviewer-avatar">
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
                              "Beautiful room with excellent amenities. The only minor issue was the check-in process took longer than expected, but the staff made up for it with exceptional service."
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

    </section><!-- /Room Details Section -->
@endsection
