@extends('layouts/main')

@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(images/header.jpg);">
        <div class="container position-relative">
            <h1>Akomodasi</h1>
            <p>Kami menyediakan beragam tipe akomodasi yang dirancang untuk setiap kebutuhan, mulai dari liburan untuk
                pasangan hingga petualangan seru bersama keluarga.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">Beranda</a></li>
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
                    <form method="GET" action="/akomodasi">
                        <div class="room-filters" data-aos="fade-right" data-aos-delay="100">
                            <h5>Filter Kamar</h5>

                            <div class="filter-group">
                                <label>Rentang Harga</label>
                                <select class="form-select" name="harga">
                                    <option value="" @selected(empty($harga))>Semua Harga</option>
                                    <option value="0-500" @selected($harga == '0-500')>Rp0 - Rp500rb</option>
                                    <option value="500-1000" @selected($harga == '500-1000')>Rp500rb - Rp1jt</option>
                                    <option value="1000+" @selected($harga == '1000+')>Rp1jt+</option>
                                </select>
                            </div>

                            <div class="filter-group">
                                <label>Kapasitas Kamar</label>
                                <select class="form-select" name="kapasitas">
                                    <option value="" @selected(empty($kapasitas))>Semua Kapasitas</option>
                                    <option value="1-2" @selected($kapasitas == '1-2')>1-2 Tamu</option>
                                    <option value="3-4" @selected($kapasitas == '3-4')>3-4 Tamu</option>
                                    <option value="5" @selected($kapasitas == '5')>5+ Tamu</option>
                                </select>
                            </div>

                            <div class="filter-group">
                                <label>Tanggal Ketersediaan</label>
                                <input type="text" id="daterange" class="form-control" placeholder="Pilih rentang tanggal">
                                <input type="hidden" name="tanggal_masuk" id="checkin">
                                <input type="hidden" name="tanggal_keluar" id="checkout">
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Terapkan Filter</button>
                            <a href="/akomodasi" class="btn btn-outline-primary w-100 mt-2">Reset Filter</a>
                        </div>
                </div>

                <div class="col-lg-9 col-md-8">
                    <div class="rooms-header d-flex justify-content-between align-items-center mb-4" data-aos="fade-left"
                        data-aos-delay="150">
                        <div class="results-count">
                            <span>Menampilkan {{ $akomodasi->count() }} akomodasi</span>
                        </div>
                        <div class="sort-options">
                            <select class="form-select" name="sort">
                                <option value="default" @selected($sort == 'default' || empty($sort))>Urutkan dari Default</option>
                                <option value="price-low" @selected($sort == 'price-low')>Harga: Rendah ke Tinggi</option>
                                <option value="price-high" @selected($sort == 'price-high')>Harga: Tinggi ke Rendah</option>
                            </select>
                        </div>
                    </div>
                    </form>

                    <div class="row gy-4">

                        @forelse ($akomodasi as $item)
                            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="room-card">
                                    <div class="room-image">
                                        <img src="{{ trim(explode(',', $item->gambar)[0]) }}" alt="{{ $item->tipe }}" class="img-fluid">
                                        @if ($item->harga_diskon != null)
                                            <div class="room-badge">Sedang Diskon</div>
                                        @endif
                                        <div class="room-price">
                                            <span
                                                class="price">{{ $item->harga_diskon != null ? @currency($item->harga_diskon) : @currency($item->harga_asli) }}</span>
                                            <span class="period"> / malam</span>
                                        </div>
                                    </div>
                                    <div class="room-content">
                                        <h4>{{ $item->tipe }}</h4>
                                        <p>{{ Str::limit($item->deskripsi, 100) }}</p>
                                        <div class="room-features">
                                            <span><i class="bi bi-people"></i>{{ $item->jumlah_tamu }} Tamu</span>
                                            <span><i class="bi bi-moon"></i>{{ $item->tipe_kasur }} Bed</span>
                                            <span><i class="bi bi-house"></i>{{ $item->luas }} m²</span>
                                        </div>
                                        <div class="room-actions">
                                            <a href="/akomodasi/{{ $item->id }}" class="btn btn-primary">Lihat
                                                Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                                <h4>Tidak ada Akomodasi</h4>
                            </div>
                        @endforelse
                    </div>

                    <div class="pagination-wrapper mt-5" data-aos="fade-up" data-aos-delay="500">
                        <nav aria-label="Room listings pagination">
                            <ul class="pagination justify-content-center">
                                @if ($akomodasi->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">Sebelumnya</span>
                                </li>
                                @else
                                <li class="page-item">
                                    <a href="{{ $akomodasi->previousPageUrl() }}" class="page-link">Sebelumnya</a>
                                </li>
                                @endif

                                @foreach ($akomodasi->getUrlRange(1, $akomodasi->lastPage()) as $page => $url)
                                    @if ($page == $akomodasi->currentPage())
                                    <li class="page-item active">
                                        <span class="page-link">{{ $page }}</span>
                                    </li>
                                    @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                    @endif
                                @endforeach

                                @if ($akomodasi->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $akomodasi->nextPageUrl() }}">Selanjutnya</a>
                                </li>
                                @else
                                <li class="page-item disabled">
                                    <span class="page-link">Selanjutnya</span>
                                </li>
                                @endif
                            </ul>
                        </nav>
                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection
