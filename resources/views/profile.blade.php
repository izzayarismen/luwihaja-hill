@extends('layouts/profile')

@php
    use Carbon\Carbon;
@endphp

@section('content')
    <!-- Content Area -->
    <section id="account" class="account section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <!-- Mobile Menu Toggle -->
            <div class="mobile-menu d-lg-none mb-4">
                <button class="mobile-menu-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#profileMenu">
                    <i class="bi bi-grid"></i>
                    <span>Menu</span>
                </button>
            </div>

            <div class="row g-4">
                @include('components/profile/sidebar')
                <div class="col-lg-9">
                    <div class="content-area">
                        <div class="tab-content">
                            <!-- Settings Tab -->
                            <div class="tab-pane fade show active" id="settings">
                                <div class="section-header" data-aos="fade-up">
                                    <h2>Account Settings</h2>
                                </div>

                                <div class="settings-content">
                                    <!-- Personal Information -->
                                    <div class="settings-section" data-aos="fade-up">
                                        <h3>Personal Information</h3>
                                        <form class="settings-form" action="/profile" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="row g-3">
                                                <div class="col-md-12">
                                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                                    <input type="text" name="nama" class="form-control" id="nama"
                                                        value="{{ Auth::user()->nama }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" name="email" class="form-control" id="email"
                                                        value="{{ Auth::user()->email }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="phone" class="form-label">Phone</label>
                                                    <input type="tel" name="telepon" class="form-control" id="phone"
                                                        value="{{ Auth::user()->telepon }}" required>
                                                </div>
                                            </div>

                                            <div class="form-buttons">
                                                <button type="submit" class="btn-save">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Security Settings -->
                                    <div class="settings-section" data-aos="fade-up" data-aos-delay="200">
                                        <h3>Security</h3>
                                        <form class="php-email-form settings-form">
                                            <div class="row g-3">
                                                <div class="col-md-12">
                                                    <label for="currentPassword" class="form-label">Current
                                                        Password</label>
                                                    <input type="password" class="form-control" id="currentPassword"
                                                        required="">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="newPassword" class="form-label">New
                                                        Password</label>
                                                    <input type="password" class="form-control" id="newPassword"
                                                        required="">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="confirmPassword" class="form-label">Confirm
                                                        Password</label>
                                                    <input type="password" class="form-control" id="confirmPassword"
                                                        required="">
                                                </div>
                                            </div>

                                            <div class="form-buttons">
                                                <button type="submit" class="btn-save">Update Password</button>
                                            </div>

                                            <div class="loading">Loading</div>
                                            <div class="error-message"></div>
                                            <div class="sent-message">Your password has been updated successfully!
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Orders Tab -->
                            <div class="tab-pane fade" id="orders">
                                <div class="section-header" data-aos="fade-up">
                                    <h2>Pesanan Saya</h2>
                                    <div class="header-actions">
                                        <div class="dropdown">
                                            <button class="filter-btn" data-bs-toggle="dropdown">
                                                <i class="bi bi-funnel"></i>
                                                <span>Filter</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">All Orders</a></li>
                                                <li><a class="dropdown-item" href="#">Belum Dibayar</a></li>
                                                <li><a class="dropdown-item" href="#">Menunggu Verifikasi</a></li>
                                                <li><a class="dropdown-item" href="#">Terverifikasi</a></li>
                                                <li><a class="dropdown-item" href="#">Selesai</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="orders-grid">
                                    @forelse ($pesanan_saya as $item)
                                    <!-- Order Card 1 -->
                                    <div class="order-card" data-aos="fade-up" data-aos-delay="100">
                                        <div class="order-header">
                                            <div class="order-id">
                                                <span class="label">Order ID:</span>
                                                <span class="value">#{{ $item->order_id }}</span>
                                            </div>
                                            <div class="order-date">{{ Carbon::parse($item->created_at)->translatedFormat('D, d M Y') }}</div>
                                        </div>
                                        <div class="order-content">
                                            <div class="product-grid">
                                                <img src="{{ $item->akomodasi->gambar }}" alt="Product" loading="lazy">
                                            </div>
                                            <div class="order-info">
                                                <div class="info-row">
                                                    <span>Status</span>
                                                    @if ($item->status == 'unpayed')
                                                    <span class="status cancelled">Belum Membayar</span>
                                                    @elseif ($item->status == 'pending')
                                                    <span class="status processing">Menunggu Verifikasi</span>
                                                    @else
                                                    <span class="status delivered">Terverifikasi</span>
                                                    @endif
                                                </div>
                                                <div class="info-row">
                                                    <span>Tanggal Masuk</span>
                                                    <span>{{ Carbon::parse($item->tanggal_masuk)->translatedFormat('D, d M Y') }}</span>
                                                </div>
                                                <div class="info-row">
                                                    <span>Tanggal Keluar</span>
                                                    <span>{{ Carbon::parse($item->tanggal_keluar)->translatedFormat('D, d M Y') }}</span>
                                                </div>
                                                <div class="info-row">
                                                    <span>Total</span>
                                                    <span class="price">{{ @currency($item->total_harga) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="order-footer">
                                            <button type="button" class="btn-track" data-bs-toggle="collapse"
                                                data-bs-target="#tracking1" aria-expanded="false">Track
                                                Order</button>
                                            <button type="button" class="btn-details" data-bs-toggle="collapse"
                                                data-bs-target="#details1" aria-expanded="false">View
                                                Details</button>
                                        </div>

                                        <!-- Order Tracking -->
                                        <div class="collapse tracking-info" id="tracking1">
                                            <div class="tracking-timeline">
                                                <div class="timeline-item completed">
                                                    <div class="timeline-icon">
                                                        <i class="bi bi-check-circle-fill"></i>
                                                    </div>
                                                    <div class="timeline-content">
                                                        <h5>Order Confirmed</h5>
                                                        <p>Your order has been received and confirmed</p>
                                                        <span class="timeline-date">Feb 20, 2025 - 10:30 AM</span>
                                                    </div>
                                                </div>

                                                <div class="timeline-item completed">
                                                    <div class="timeline-icon">
                                                        <i class="bi bi-check-circle-fill"></i>
                                                    </div>
                                                    <div class="timeline-content">
                                                        <h5>Processing</h5>
                                                        <p>Your order is being prepared for shipment</p>
                                                        <span class="timeline-date">Feb 20, 2025 - 2:45 PM</span>
                                                    </div>
                                                </div>

                                                <div class="timeline-item active">
                                                    <div class="timeline-icon">
                                                        <i class="bi bi-box-seam"></i>
                                                    </div>
                                                    <div class="timeline-content">
                                                        <h5>Packaging</h5>
                                                        <p>Your items are being packaged for shipping</p>
                                                        <span class="timeline-date">Feb 20, 2025 - 4:15 PM</span>
                                                    </div>
                                                </div>

                                                <div class="timeline-item">
                                                    <div class="timeline-icon">
                                                        <i class="bi bi-truck"></i>
                                                    </div>
                                                    <div class="timeline-content">
                                                        <h5>In Transit</h5>
                                                        <p>Expected to ship within 24 hours</p>
                                                    </div>
                                                </div>

                                                <div class="timeline-item">
                                                    <div class="timeline-icon">
                                                        <i class="bi bi-house-door"></i>
                                                    </div>
                                                    <div class="timeline-content">
                                                        <h5>Delivery</h5>
                                                        <p>Estimated delivery: Feb 22, 2025</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Order Details -->
                                        <div class="collapse order-details" id="details1">
                                            <div class="details-content">
                                                <div class="detail-section">
                                                    <h5>Order Information</h5>
                                                    <div class="info-grid">
                                                        <div class="info-item">
                                                            <span class="label">Payment Method</span>
                                                            <span class="value">Credit Card (**** 4589)</span>
                                                        </div>
                                                        <div class="info-item">
                                                            <span class="label">Shipping Method</span>
                                                            <span class="value">Express Delivery (2-3 days)</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="detail-section">
                                                    <h5>Items (3)</h5>
                                                    <div class="order-items">
                                                        <div class="item">
                                                            <img src="images/product-1.webp" alt="Product"
                                                                loading="lazy">
                                                            <div class="item-info">
                                                                <h6>Lorem ipsum dolor sit amet</h6>
                                                                <div class="item-meta">
                                                                    <span class="sku">SKU: PRD-001</span>
                                                                    <span class="qty">Qty: 1</span>
                                                                </div>
                                                            </div>
                                                            <div class="item-price">$899.99</div>
                                                        </div>

                                                        <div class="item">
                                                            <img src="images/product-2.webp" alt="Product"
                                                                loading="lazy">
                                                            <div class="item-info">
                                                                <h6>Consectetur adipiscing elit</h6>
                                                                <div class="item-meta">
                                                                    <span class="sku">SKU: PRD-002</span>
                                                                    <span class="qty">Qty: 2</span>
                                                                </div>
                                                            </div>
                                                            <div class="item-price">$599.95</div>
                                                        </div>

                                                        <div class="item">
                                                            <img src="images/product-3.webp" alt="Product"
                                                                loading="lazy">
                                                            <div class="item-info">
                                                                <h6>Sed do eiusmod tempor</h6>
                                                                <div class="item-meta">
                                                                    <span class="sku">SKU: PRD-003</span>
                                                                    <span class="qty">Qty: 1</span>
                                                                </div>
                                                            </div>
                                                            <div class="item-price">$129.99</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="detail-section">
                                                    <h5>Price Details</h5>
                                                    <div class="price-breakdown">
                                                        <div class="price-row">
                                                            <span>Subtotal</span>
                                                            <span>$1,929.93</span>
                                                        </div>
                                                        <div class="price-row">
                                                            <span>Shipping</span>
                                                            <span>$15.99</span>
                                                        </div>
                                                        <div class="price-row">
                                                            <span>Tax</span>
                                                            <span>$159.98</span>
                                                        </div>
                                                        <div class="price-row total">
                                                            <span>Total</span>
                                                            <span>$2,105.90</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="detail-section">
                                                    <h5>Shipping Address</h5>
                                                    <div class="address-info">
                                                        <p>Sarah Anderson<br>123 Main Street<br>Apt 4B<br>New York,
                                                            NY 10001<br>United States</p>
                                                        <p class="contact">+1 (555) 123-4567</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <p class="text-center">Belum ada pesanan.</p>
                                    @endforelse
                                </div>
                            </div>

                            <!-- Reviews Tab -->
                            <div class="tab-pane fade" id="reviews">
                                <div class="section-header" data-aos="fade-up">
                                    <h2>My Reviews</h2>
                                    <div class="header-actions">
                                        <div class="dropdown">
                                            <button class="filter-btn" data-bs-toggle="dropdown">
                                                <i class="bi bi-funnel"></i>
                                                <span>Sort by: Recent</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Recent</a></li>
                                                <li><a class="dropdown-item" href="#">Highest Rating</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">Lowest Rating</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="reviews-grid">
                                    <!-- Review Card 1 -->
                                    <div class="review-card" data-aos="fade-up" data-aos-delay="100">
                                        <div class="review-header">
                                            <img src="images/product-1.webp" alt="Product" class="product-image"
                                                loading="lazy">
                                            <div class="review-meta">
                                                <h4>Lorem ipsum dolor sit amet</h4>
                                                <div class="rating">
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <span>(5.0)</span>
                                                </div>
                                                <div class="review-date">Reviewed on Feb 15, 2025</div>
                                            </div>
                                        </div>
                                        <div class="review-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                        <div class="review-footer">
                                            <button type="button" class="btn-edit">Edit Review</button>
                                            <button type="button" class="btn-delete">Delete</button>
                                        </div>
                                    </div>

                                    <!-- Review Card 2 -->
                                    <div class="review-card" data-aos="fade-up" data-aos-delay="200">
                                        <div class="review-header">
                                            <img src="images/product-2.webp" alt="Product" class="product-image"
                                                loading="lazy">
                                            <div class="review-meta">
                                                <h4>Consectetur adipiscing elit</h4>
                                                <div class="rating">
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star"></i>
                                                    <span>(4.0)</span>
                                                </div>
                                                <div class="review-date">Reviewed on Feb 10, 2025</div>
                                            </div>
                                        </div>
                                        <div class="review-content">
                                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                                nisi ut aliquip ex ea commodo consequat.</p>
                                        </div>
                                        <div class="review-footer">
                                            <button type="button" class="btn-edit">Edit Review</button>
                                            <button type="button" class="btn-delete">Delete</button>
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
