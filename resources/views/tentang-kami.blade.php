@extends('layouts/main')

@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(images/showcase-7.webp);">
        <div class="container position-relative">
            <h1>Tentang Kami</h1>
            <p>Lebih dari sekadar penginapan, kami adalah gerbang Anda menuju keindahan alam yang asri dan pengalaman yang tak terlupakan.</p>
            <nav class="breadcrumbs">
            <ol>
                <li><a href="index.html">Beranda</a></li>
                <li class="current">Tentang Kami</li>
            </ol>
            </nav>
        </div>
    </div>

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-lg-6">
            <div class="about-content">
              <h3>Selamat datang di Villa Air Luwihaja Hill</h3>
              <p>
                Villa Air Luwihaja Hill adalah  sebuah destinasi penginapan istimewa yang dirancang untuk menyatukan kenyamanan modern dengan pesona alam yang asri. Kami menawarkan pengalaman menginap yang unik di mana Anda dapat beristirahat dengan tenang sambil menikmati pemandangan dan kesegaran aliran sungai jernih yang berada tepat di depan mata Anda</p>
              <p>
                Kami menyediakan beragam tipe akomodasi untuk memenuhi segala kebutuhan Anda. Mulai dari kamar Deluxe Bed, Queen Bed, dan Twin Bed yang cocok untuk dua orang , hingga Super Duluxe dan berbagai tipe Family Room yang lebih luas untuk keluarga atau rombongan. Setiap unit kami menawarkan pemandangan yang menenangkan, baik itu pemandangan langsung ke arah sungai , taman dan kolam ikan , maupun pegunungan dan kolam renang.</p>

              <div class="cta-button">
                <a href="#" class="btn-primary">Discover Our Story</a>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="about-visuals">
              <div class="main-image" data-aos="zoom-in" data-aos-delay="200">
                <img src="images/showcase-3.webp" alt="Hotel Luxury Suite" class="img-fluid">
                <div class="image-overlay">
                  <a href="https://youtu.be/mL6Ar3dfMMM?si=P0sO6xe3wfShD1eK" class="glightbox">
                    <div class="play-button">
                      <i class="bi bi-play-circle"></i>
                    </div>
                  </a>
                </div>
              </div>

    </section><!-- /About Section -->

    <!-- Rooms Showcase About Section -->
    <section id="rooms-showcase-about" class="rooms-showcase-about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Akomodasi</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="room-card">
              <div class="room-image">
                <img src="images/room-1.webp" alt="Deluxe Room" class="img-fluid">
                <div class="room-overlay">
                  <a href="room-details.html" class="btn-explore">Explore Room</a>
                </div>
              </div>
              <div class="room-content">
                <h4>Deluxe King Room</h4>
                <p class="room-description">Spacious room with modern amenities, city view, and luxurious king-size bed for ultimate comfort.</p>
                <div class="room-features">
                  <span class="feature-item"><i class="bi bi-people"></i> 2 Guests</span>
                  <span class="feature-item"><i class="bi bi-tv"></i> Smart TV</span>
                  <span class="feature-item"><i class="bi bi-wifi"></i> Free WiFi</span>
                </div>
                <div class="room-footer">
                  <div class="room-price">
                    <span class="price-from">From</span>
                    <span class="price-amount">$189</span>
                    <span class="price-period">/night</span>
                  </div>
                  <a href="room-details.html" class="btn-view-details">View Details</a>
                </div>
              </div>
            </div>
          </div><!-- End Room Card -->

          <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="250">
            <div class="room-card">
              <div class="room-image">
                <img src="images/room-5.webp" alt="Executive Suite" class="img-fluid">
                <div class="room-overlay">
                  <a href="room-details.html" class="btn-explore">Explore Room</a>
                </div>
              </div>
              <div class="room-content">
                <h4>Executive Suite</h4>
                <p class="room-description">Elegant suite featuring separate living area, premium furnishings, and panoramic views of the city skyline.</p>
                <div class="room-features">
                  <span class="feature-item"><i class="bi bi-people"></i> 4 Guests</span>
                  <span class="feature-item"><i class="bi bi-cup-hot"></i> Coffee Machine</span>
                  <span class="feature-item"><i class="bi bi-building"></i> City View</span>
                </div>
                <div class="room-footer">
                  <div class="room-price">
                    <span class="price-from">From</span>
                    <span class="price-amount">$319</span>
                    <span class="price-period">/night</span>
                  </div>
                  <a href="room-details.html" class="btn-view-details">View Details</a>
                </div>
              </div>
            </div>
          </div><!-- End Room Card -->

          <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="room-card">
              <div class="room-image">
                <img src="images/room-12.webp" alt="Family Room" class="img-fluid">
                <div class="room-overlay">
                  <a href="room-details.html" class="btn-explore">Explore Room</a>
                </div>
              </div>
              <div class="room-content">
                <h4>Family Triple Room</h4>
                <p class="room-description">Perfect for families with connecting rooms, extra space, and child-friendly amenities for a comfortable stay.</p>
                <div class="room-features">
                  <span class="feature-item"><i class="bi bi-people"></i> 6 Guests</span>
                  <span class="feature-item"><i class="bi bi-door-open"></i> Connecting Rooms</span>
                  <span class="feature-item"><i class="bi bi-controller"></i> Games Console</span>
                </div>
                <div class="room-footer">
                  <div class="room-price">
                    <span class="price-from">From</span>
                    <span class="price-amount">$259</span>
                    <span class="price-period">/night</span>
                  </div>
                  <a href="room-details.html" class="btn-view-details">View Details</a>
                </div>
              </div>
            </div>
          </div><!-- End Room Card -->

          <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="350">
            <div class="room-card">
              <div class="room-image">
                <img src="images/room-8.webp" alt="Standard Room" class="img-fluid">
                <div class="room-overlay">
                  <a href="room-details.html" class="btn-explore">Explore Room</a>
                </div>
              </div>
              <div class="room-content">
                <h4>Standard Double Room</h4>
                <p class="room-description">Comfortable and affordable accommodation with essential amenities and contemporary design for business travelers.</p>
                <div class="room-features">
                  <span class="feature-item"><i class="bi bi-people"></i> 2 Guests</span>
                  <span class="feature-item"><i class="bi bi-briefcase"></i> Work Desk</span>
                  <span class="feature-item"><i class="bi bi-telephone"></i> Direct Dial</span>
                </div>
                <div class="room-footer">
                  <div class="room-price">
                    <span class="price-from">From</span>
                    <span class="price-amount">$129</span>
                    <span class="price-period">/night</span>
                  </div>
                  <a href="room-details.html" class="btn-view-details">View Details</a>
                </div>
              </div>
            </div>
          </div><!-- End Room Card -->

          <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
            <div class="room-card">
              <div class="room-image">
                <img src="images/room-15.webp" alt="Ocean View Suite" class="img-fluid">
                <div class="room-overlay">
                  <a href="room-details.html" class="btn-explore">Explore Room</a>
                </div>
              </div>
              <div class="room-content">
                <h4>Ocean View Suite</h4>
                <p class="room-description">Luxurious suite with breathtaking ocean views, private balcony, and premium amenities for an unforgettable experience.</p>
                <div class="room-features">
                  <span class="feature-item"><i class="bi bi-people"></i> 3 Guests</span>
                  <span class="feature-item"><i class="bi bi-water"></i> Ocean View</span>
                  <span class="feature-item"><i class="bi bi-tree"></i> Balcony</span>
                </div>
                <div class="room-footer">
                  <div class="room-price">
                    <span class="price-from">From</span>
                    <span class="price-amount">$429</span>
                    <span class="price-period">/night</span>
                  </div>
                  <a href="room-details.html" class="btn-view-details">View Details</a>
                </div>
              </div>
            </div>
          </div><!-- End Room Card -->

          <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="450">
            <div class="room-card">
              <div class="room-image">
                <img src="images/room-3.webp" alt="Presidential Suite" class="img-fluid">
                <div class="room-overlay">
                  <a href="room-details.html" class="btn-explore">Explore Room</a>
                </div>
              </div>
              <div class="room-content">
                <h4>Presidential Suite</h4>
                <p class="room-description">Ultimate luxury experience with spacious living areas, gourmet kitchen, and exclusive concierge services available.</p>
                <div class="room-features">
                  <span class="feature-item"><i class="bi bi-people"></i> 8 Guests</span>
                  <span class="feature-item"><i class="bi bi-award"></i> Concierge</span>
                  <span class="feature-item"><i class="bi bi-house"></i> Private Kitchen</span>
                </div>
                <div class="room-footer">
                  <div class="room-price">
                    <span class="price-from">From</span>
                    <span class="price-amount">$799</span>
                    <span class="price-period">/night</span>
                  </div>
                  <a href="room-details.html" class="btn-view-details">View Details</a>
                </div>
              </div>
            </div>
          </div><!-- End Room Card -->

        </div>

        <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="500">
          <a href="rooms.html" class="btn-view-all-rooms">View All Rooms & Suites</a>
        </div>

      </div>

    </section><!-- /Rooms Showcase About Section -->
@endsection
