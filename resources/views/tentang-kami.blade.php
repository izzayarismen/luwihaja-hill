@extends('layouts/main')

@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(images/header.jpg);">
        <div class="container position-relative">
            <h1>Tentang Kami</h1>
            <p>Lebih dari sekadar penginapan, kami adalah gerbang Anda menuju keindahan alam yang asri dan pengalaman yang
                tak terlupakan.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">Beranda</a></li>
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
                            Villa Air Luwihaja Hill adalah sebuah destinasi penginapan istimewa yang dirancang untuk
                            menyatukan kenyamanan modern dengan pesona alam yang asri. Kami menawarkan pengalaman menginap
                            yang unik di mana Anda dapat beristirahat dengan tenang sambil menikmati pemandangan dan
                            kesegaran aliran sungai jernih yang berada tepat di depan mata Anda</p>
                        <p>
                            Kami menyediakan beragam tipe akomodasi untuk memenuhi segala kebutuhan Anda. Mulai dari kamar
                            Deluxe Bed, Queen Bed, dan Twin Bed yang cocok untuk dua orang , hingga Super Duluxe dan
                            berbagai tipe Family Room yang lebih luas untuk keluarga atau rombongan. Setiap unit kami
                            menawarkan pemandangan yang menenangkan, baik itu pemandangan langsung ke arah sungai , taman
                            dan kolam ikan , maupun pegunungan dan kolam renang.</p>

                        {{-- <div class="cta-button">
                            <a href="#" class="btn-primary">Discover Our Story</a>
                        </div> --}}
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-visuals">
                        <div class="main-image" data-aos="zoom-in" data-aos-delay="200">
                            <img src="images/tentangkami1.jpg" alt="tentangkami1" class="img-fluid">
                            <div class="image-overlay">
                                <a href="https://youtu.be/mL6Ar3dfMMM?si=P0sO6xe3wfShD1eK" class="glightbox">
                                    <div class="play-button">
                                        <i class="bi bi-play-circle"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /About Section -->

    <!-- Rooms Showcase About Section -->
    <section id="rooms-showcase-about" class="rooms-showcase-about section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Akomodasi</h2>
            <p>Kami menyediakan beragam tipe akomodasi yang dirancang untuk setiap kebutuhan, mulai dari liburan untuk pasangan hingga petualangan seru bersama keluarga.</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
                @foreach ($akomodasi->take(3) as $item)
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="room-card">
                        <div class="room-image">
                            <img src="{{ $item->gambar }}" alt="Deluxe Room" class="img-fluid">
                            <div class="room-overlay">
                                <a href="/akomodasi/{{ $item->id }}" class="btn-explore">Lihat akomodasi</a>
                            </div>
                        </div>
                        <div class="room-content">
                            <h4>{{ $item->tipe }}</h4>
                            <p class="room-description">{{ $item->deskripsi }}</p>
                            <div class="room-features">
                                <span><i class="bi bi-people"></i>{{ $item->jumlah_tamu }} Tamu</span>
                                <span><i class="bi bi-moon"></i>{{ $item->tipe_kasur }} Bed</span>
                                <span><i class="bi bi-house"></i>{{ $item->luas }} m²</span>
                            </div>
                            <div class="room-footer">
                                <div class="room-price">
                                    <span class="price-from">Mulai dari</span>
                                    <span class="price-amount">{{ @currency($item->harga_diskon != null ? $item->harga_diskon : $item->harga_asli) }}</span>
                                    <span class="price-period">/ malam</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="500">
                <a href="/akomodasi" class="btn-view-all-rooms">Lihat semua akomodasi</a>
            </div>

        </div>

    </section><!-- /Rooms Showcase About Section -->
@endsection
