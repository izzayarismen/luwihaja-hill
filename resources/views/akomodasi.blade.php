@extends('layouts/main')

@section('content')

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(images/showcase-7.webp);">
      <div class="container position-relative">
        <h1>Akomodasi</h1>
        <p>Kami menyediakan beragam tipe akomodasi yang dirancang untuk setiap kebutuhan, mulai dari liburan untuk pasangan hingga petualangan seru bersama keluarga.</p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Beranda</a></li>
            <li class="current">Akomodasi</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Rooms 2 Section -->
    <section id="rooms-2" class="rooms-2 section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">

          <div class="col-lg-3 col-md-4">
            <div class="room-filters" data-aos="fade-right" data-aos-delay="100">
              <h5>Filter Kamar</h5>

              <div class="filter-group">
                <label>Rentang Harga</label>
                <select class="form-select">
                  <option value="">Semua Harga</option>
                  <option value="budget">$100 - $200</option>
                  <option value="mid">$200 - $350</option>
                  <option value="luxury">$350+</option>
                </select>
              </div>

              <div class="filter-group">
                <label>Kapasitas Kamar</label>
                <select class="form-select">
                  <option value="">Semua Kapasitas</option>
                  <option value="1-2">1-2 Tamu</option>
                  <option value="3-4">3-4 Tamu</option>
                  <option value="5+">5+ Tamu</option>
                </select>
              </div>

              <div class="filter-group">
                <label>Tipe Pemandangan</label>
                <select class="form-select">
                  <option value="">Semua Pemandangan</option>
                  <option value="ocean">Ocean View</option>
                  <option value="garden">Garden View</option>
                  <option value="city">City View</option>
                </select>
              </div>

              <div class="filter-group">
                <label>Fasilitas Kamar</label>
                <div class="feature-checkboxes">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="wifi">
                    <label class="form-check-label" for="wifi">WiFi Gratis</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="balcony">
                    <label class="form-check-label" for="balcony">Mini Kitchen</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="kitchen">
                    <label class="form-check-label" for="kitchen">Non-Smooking Room</label>
                  </div>
                </div>
              </div>

              <button type="button" class="btn btn-primary w-100">Terapkan Filter</button>
            </div>
          </div>

          <div class="col-lg-9 col-md-8">
            <div class="rooms-header d-flex justify-content-between align-items-center mb-4" data-aos="fade-left" data-aos-delay="150">
              <div class="results-count">
                <span>Menampilkan 6 tipe kamar</span>
              </div>
              <div class="sort-options">
                <select class="form-select">
                  <option value="featured">Urutkan dari Best Seller</option>
                  <option value="price-low">Harga: Rendah ke Tinggi</option>
                  <option value="price-high">Harga: Tinggi ke Rendah</option>
                  <option value="rating">Ulasan Tamu</option>
                </select>
              </div>
            </div>

            <div class="row gy-4">

              <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="room-card">
                  <div class="room-image">
                    <img src="images/room-1.webp" alt="Deluxe Ocean Suite" class="img-fluid">
                    <div class="room-badge">Best Seller</div>
                    <div class="room-price">
                      <span class="price">$299</span>
                      <span class="period">/ night</span>
                    </div>
                  </div>
                  <div class="room-content">
                    <h4>Deluxe Ocean Suite</h4>
                    <p>Experience luxury with breathtaking ocean views, private balcony, and premium amenities. Perfect for romantic getaways and special occasions.</p>
                    <div class="room-features">
                      <span><i class="bi bi-people"></i> 2-4 Guests</span>
                      <span><i class="bi bi-wifi"></i> Free Wi-Fi</span>
                      <span><i class="bi bi-cup-hot"></i> Minibar</span>
                    </div>
                    <div class="room-actions">
                      <a href="/akomodasi/1" class="btn btn-primary">View Details</a>
                      <a href="booking.html" class="btn btn-outline-primary">Check Availability</a>
                    </div>
                  </div>
                </div>
              </div><!-- End Room Card -->

              <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
                <div class="room-card">
                  <div class="room-image">
                    <img src="images/room-3.webp" alt="Garden View Double" class="img-fluid">
                    <div class="room-price">
                      <span class="price">$189</span>
                      <span class="period">/ night</span>
                    </div>
                  </div>
                  <div class="room-content">
                    <h4>Garden View Double</h4>
                    <p>Relax in comfort with serene garden views and modern furnishings. Ideal for couples seeking tranquility and peaceful surroundings.</p>
                    <div class="room-features">
                      <span><i class="bi bi-people"></i> 2 Guests</span>
                      <span><i class="bi bi-wifi"></i> Free Wi-Fi</span>
                      <span><i class="bi bi-tv"></i> Smart TV</span>
                    </div>
                    <div class="room-actions">
                      <a href="/akomodasi/1" class="btn btn-primary">View Details</a>
                      <a href="booking.html" class="btn btn-outline-primary">Check Availability</a>
                    </div>
                  </div>
                </div>
              </div><!-- End Room Card -->

              <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                <div class="room-card">
                  <div class="room-image">
                    <img src="images/room-5.webp" alt="Family Suite" class="img-fluid">
                    <div class="room-badge featured">Featured</div>
                    <div class="room-price">
                      <span class="price">$399</span>
                      <span class="period">/ night</span>
                    </div>
                  </div>
                  <div class="room-content">
                    <h4>Family Suite</h4>
                    <p>Spacious accommodations designed for families with separate living area, kitchenette, and connecting rooms for maximum comfort.</p>
                    <div class="room-features">
                      <span><i class="bi bi-people"></i> 4-6 Guests</span>
                      <span><i class="bi bi-house"></i> Kitchenette</span>
                      <span><i class="bi bi-controller"></i> Game Console</span>
                    </div>
                    <div class="room-actions">
                      <a href="/akomodasi/1" class="btn btn-primary">View Details</a>
                      <a href="booking.html" class="btn btn-outline-primary">Check Availability</a>
                    </div>
                  </div>
                </div>
              </div><!-- End Room Card -->

              <div class="col-lg-6" data-aos="fade-up" data-aos-delay="350">
                <div class="room-card">
                  <div class="room-image">
                    <img src="images/room-7.webp" alt="Business Executive" class="img-fluid">
                    <div class="room-price">
                      <span class="price">$249</span>
                      <span class="period">/ night</span>
                    </div>
                  </div>
                  <div class="room-content">
                    <h4>Business Executive</h4>
                    <p>Professional workspace meets luxury comfort with dedicated work area, high-speed internet, and premium business amenities.</p>
                    <div class="room-features">
                      <span><i class="bi bi-people"></i> 1-2 Guests</span>
                      <span><i class="bi bi-laptop"></i> Work Desk</span>
                      <span><i class="bi bi-telephone"></i> Business Line</span>
                    </div>
                    <div class="room-actions">
                      <a href="/akomodasi/1" class="btn btn-primary">View Details</a>
                      <a href="booking.html" class="btn btn-outline-primary">Check Availability</a>
                    </div>
                  </div>
                </div>
              </div><!-- End Room Card -->

              <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                <div class="room-card">
                  <div class="room-image">
                    <img src="images/room-9.webp" alt="Standard King" class="img-fluid">
                    <div class="room-price">
                      <span class="price">$149</span>
                      <span class="period">/ night</span>
                    </div>
                  </div>
                  <div class="room-content">
                    <h4>Standard King</h4>
                    <p>Comfortable and affordable accommodation with modern amenities and city views. Perfect for business travelers and short stays.</p>
                    <div class="room-features">
                      <span><i class="bi bi-people"></i> 2 Guests</span>
                      <span><i class="bi bi-wifi"></i> Free Wi-Fi</span>
                      <span><i class="bi bi-car-front"></i> Free Parking</span>
                    </div>
                    <div class="room-actions">
                      <a href="/akomodasi/1" class="btn btn-primary">View Details</a>
                      <a href="booking.html" class="btn btn-outline-primary">Check Availability</a>
                    </div>
                  </div>
                </div>
              </div><!-- End Room Card -->

              <div class="col-lg-6" data-aos="fade-up" data-aos-delay="450">
                <div class="room-card">
                  <div class="room-image">
                    <img src="images/room-11.webp" alt="Presidential Suite" class="img-fluid">
                    <div class="room-badge luxury">Luxury</div>
                    <div class="room-price">
                      <span class="price">$699</span>
                      <span class="period">/ night</span>
                    </div>
                  </div>
                  <div class="room-content">
                    <h4>Presidential Suite</h4>
                    <p>Ultimate luxury experience with panoramic views, private terrace, butler service, and exclusive access to premium hotel facilities.</p>
                    <div class="room-features">
                      <span><i class="bi bi-people"></i> 4 Guests</span>
                      <span><i class="bi bi-person-badge"></i> Butler Service</span>
                      <span><i class="bi bi-star"></i> Premium Access</span>
                    </div>
                    <div class="room-actions">
                      <a href="/akomodasi/1" class="btn btn-primary">View Details</a>
                      <a href="booking.html" class="btn btn-outline-primary">Check Availability</a>
                    </div>
                  </div>
                </div>
              </div><!-- End Room Card -->

            </div>

            <div class="pagination-wrapper mt-5" data-aos="fade-up" data-aos-delay="500">
              <nav aria-label="Room listings pagination">
                <ul class="pagination justify-content-center">
                  <li class="page-item disabled">
                    <span class="page-link">Previous</span>
                  </li>
                  <li class="page-item active">
                    <span class="page-link">1</span>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">3</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                  </li>
                </ul>
              </nav>
            </div>

          </div>

        </div>

      </div>

    </section><!-- /Rooms 2 Section -->
@endsection