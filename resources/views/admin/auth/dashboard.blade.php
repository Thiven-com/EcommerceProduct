<?php $page = 'index'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">

            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-2">
                <div class="mb-3">
                    <h1 class="mb-1">Welcome, Admin</h1>
                    <p class="fw-medium">You have <span
                            class="text-primary fw-bold">{{ number_format($ordersCount) }}</span> Orders, Today</p>
                </div>
                <div class="input-icon-start position-relative mb-3">
                    <span class="input-icon-addon fs-16 text-gray-9">
                        <i class="ti ti-calendar"></i>
                    </span>
                    <input type="text" class="form-control date-range bookingrange" placeholder="Search Product">
                </div>
            </div>

            @if($lowStockAlert)
                <div class="alert bg-orange-transparent alert-dismissible fade show mb-4">
                    <div>
                        <span><i class="ti ti-info-circle fs-14 text-orange me-2"></i>Your Product </span>
                        <span class="text-orange fw-semibold">{{ $lowStockAlert->title ?? 'Low stock item' }}</span>
                        is running low, already below {{ $lowStockThreshold }} Pcs.,
                        <a href="{{ route('admin.products.edit', $lowStockAlert->product_id) }}"
                            class="link-orange text-decoration-underline fw-semibold">View / Add Stock</a>
                    </div>
                    <button type="button" class="btn-close text-gray-9 fs-14" data-bs-dismiss="alert" aria-label="Close"><i
                            class="ti ti-x"></i></button>
                </div>
            @endif

            <div class="row">
                {{-- Cards: Total Sales, Returns, Purchase, Purchase Return --}}
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-primary sale-widget flex-fill">
                        <div class="card-body d-flex align-items-center">
                            <span class="sale-icon bg-white text-primary"><i class="ti ti-file-text fs-24"></i></span>
                            <div class="ms-2">
                                <p class="text-white mb-1">Total Sales</p>
                                <div class="d-inline-flex align-items-center flex-wrap gap-2">
                                    <h4 class="text-white">₹{{ number_format($totals['sales'] ?? 0, 2) }}</h4>
                                    <span class="badge badge-soft-primary"><i
                                            class="ti ti-arrow-up me-1"></i>{{ $totals['sales_change_percent'] ?? '0%' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-secondary sale-widget flex-fill">
                        <div class="card-body d-flex align-items-center">
                            <span class="sale-icon bg-white text-secondary"><i class="ti ti-repeat fs-24"></i></span>
                            <div class="ms-2">
                                <p class="text-white mb-1">Total Sales Return</p>
                                <div class="d-inline-flex align-items-center flex-wrap gap-2">
                                    <h4 class="text-white">₹{{ number_format($totals['sales_return'] ?? 0, 2) }}</h4>
                                    <span class="badge badge-soft-danger"><i
                                            class="ti ti-arrow-down me-1"></i>{{ $totals['returns_change_percent'] ?? '0%' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-teal sale-widget flex-fill">
                        <div class="card-body d-flex align-items-center">
                            <span class="sale-icon bg-white text-teal"><i class="ti ti-gift fs-24"></i></span>
                            <div class="ms-2">
                                <p class="text-white mb-1">Total Purchase</p>
                                <div class="d-inline-flex align-items-center flex-wrap gap-2">
                                    <h4 class="text-white">₹{{ number_format($totals['purchase'] ?? 0, 2) }}</h4>
                                    {{-- <span class="badge badge-soft-success"><i class="ti ti-arrow-up me-1"></i>{{
                                        $totals['purchase_change_percent'] ?? '0%' }}</span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-info sale-widget flex-fill">
                        <div class="card-body d-flex align-items-center">
                            <span class="sale-icon bg-white text-info"><i class="ti ti-brand-pocket fs-24"></i></span>
                            <div class="ms-2">
                                <p class="text-white mb-1">Total Purchase Return</p>
                                <div class="d-inline-flex align-items-center flex-wrap gap-2">
                                    <h4 class="text-white">₹{{ number_format($totals['purchase_return'] ?? 0, 2) }}</h4>
                                    {{-- <span class="badge badge-soft-success"><i class="ti ti-arrow-up me-1"></i>{{
                                        $totals['purchase_return_change_percent'] ?? '0%' }}</span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-info sale-widget flex-fill">
                        <div class="card-body d-flex align-items-center">
                            <span class="sale-icon bg-white text-info"><i class="ti ti-brand-pocket fs-24"></i></span>
                            <div class="ms-2">
                                <p class="text-white mb-1">Pending Parcel Creations</p>
                                <div class="d-inline-flex align-items-center flex-wrap gap-2">
                                    <h4 class="text-white">{{ $pendingJobs ?? 0}}</h4>
                                    {{-- <span class="badge badge-soft-success"><i class="ti ti-arrow-up me-1"></i>{{
                                        $totals['purchase_return_change_percent'] ?? '0%' }}</span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">

                <div class="col-xxl-4 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="d-inline-flex align-items-center">
                                <span class="title-icon bg-soft-pink fs-16 me-2"><i class="ti ti-box"></i></span>
                                <h5 class="card-title mb-0">Top Selling Products</h5>
                            </div>
                        </div>
                        <div class="card-body sell-product">
                            @foreach($topSelling as $p)
                                <div class="d-flex align-items-center justify-content-between border-bottom mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="ms-2">
                                            <h6 class="fw-bold mb-1">{{ $p->product_title }}</h6>
                                            <div class="d-flex align-items-center item-list">
                                                <p>₹{{ number_format($p->unit_price, 2) }}</p>
                                                <p>{{ $p->total_quantity }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Low Stock Products --}}
                <div class="col-xxl-4 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="d-inline-flex align-items-center">
                                <span class="title-icon bg-soft-danger fs-16 me-2"><i
                                        class="ti ti-alert-triangle"></i></span>
                                <h5 class="card-title mb-0">Low Stock Products</h5>
                            </div>
                            <a href="{{ route('admin.products.index') }}"
                                class="fs-13 fw-medium text-decoration-underline">View All</a>
                        </div>
                        <div class="card-body">
                            @foreach($lowStockProducts as $ls)
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('admin.products.edit', $ls->product_id) }}" class="avatar avatar-lg">
                                            <img src="{{ $ls->image ? asset($ls->image) : asset('build/img/products/product-06.jpg') }}"
                                                alt="img">
                                        </a>
                                        <div class="ms-2">
                                            <h6 class="fw-bold mb-1"><a
                                                    href="{{ route('admin.products.edit', $ls->product_id) }}">{{ $ls->title }}</a>
                                            </h6>
                                            <p class="fs-13">ID : #{{ $ls->sku ?? $ls->id }}</p>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <p class="fs-13 mb-1">Instock</p>
                                        <h6 class="text-orange fw-medium">{{ $ls->stock }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Recent Sales --}}
                <div class="col-xxl-4 col-md-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="d-inline-flex align-items-center">
                                <span class="title-icon bg-soft-pink fs-16 me-2"><i class="ti ti-box"></i></span>
                                <h5 class="card-title mb-0">Recent Sales</h5>
                            </div>
                            <a href="{{ route('admin.orders.index', ['payment_status' => 'paid']) }}"
                                class="fs-13 fw-medium text-decoration-underline">View
                                All</a>
                        </div>
                        <div class="card-body">
                            @foreach($recentSales as $sale)
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="d-flex align-items-center">
                                        {{-- <a href="{{ url('orders/'.$sale->id) }}" class="avatar avatar-lg">
                                            <img src="{{ $sale->customer_avatar ? asset($sale->customer_avatar) : asset('build/img/customer/customer16.jpg') }}"
                                                alt="product">
                                        </a> --}}
                                        <div class="ms-2">
                                            <h6 class="fw-bold mb-1"><a
                                                    href="{{ route('admin.orders.show', $sale->id) }}">{{ $sale->customer_name }}</a>
                                            </h6>
                                            <div class="d-flex align-items-center item-list">
                                                <p class="text-gray-9">₹{{ number_format($sale->grand_total, 2) }}</p>
                                                <p class="text-muted ms-2">{{ $sale->created_at->format('d M Y') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <span
                                            class="badge {{ $sale->status == 'completed' ? 'badge-success' : 'badge-cyan' }} badge-xs">{{ ucfirst($sale->status) }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

            <div class="card flex-fill">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="d-inline-flex align-items-center">
                        <span class="title-icon bg-soft-warning fs-16 me-2">
                            <i class="ti ti-shopping-bag"></i>
                        </span>
                        <h5 class="card-title mb-0">Today's Orders</h5>
                    </div>

                    <div>
                        <a href="{{ route('admin.reports.orders.today') }}" class="btn btn-sm btn-warning me-2">
                            Export Excel
                        </a>
                        {{-- <a href="{{ route('admin.orders.index') }}" class="fs-13 fw-medium text-decoration-underline">
                            View All
                        </a> --}}
                    </div>
                </div>

                <div class="card-body">
                    @forelse($todayOrders as $order)
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center">
                                <div class="ms-2">
                                    <h6 class="fw-bold mb-1">
                                        <a href="{{ route('admin.orders.show', $order->id) }}">
                                            Order #{{ $order->invoice_id }}
                                        </a>
                                    </h6>

                                    <div class="d-flex align-items-center item-list">
                                        <p class="text-gray-9">
                                            ₹{{ number_format($order->grand_total, 2) }}
                                        </p>
                                        <p class="text-muted ms-2">
                                            {{ $order->created_at->format('d M Y') }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="text-end">
                                <span
                                    class="badge 
                                                                        {{ $order->status == 'completed' ? 'badge-success' : 'badge-warning' }} badge-xs">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted text-center">No orders today</p>
                    @endforelse
                </div>
            </div>

            <div class="card flex-fill">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="d-inline-flex align-items-center">
                        <span class="title-icon bg-soft-primary fs-16 me-2">
                            <i class="ti ti-cash"></i>
                        </span>
                        <h5 class="card-title mb-0">Today's Transactions</h5>
                    </div>

                    <div>
                        <a href="{{ route('admin.reports.transactions.today') }}" class="btn btn-sm btn-primary me-2">
                            Export Excel
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    @forelse($todayTransactions as $txn)
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center">
                                <div class="ms-2">
                                    <h6 class="fw-bold mb-1">
                                        Order # {{ $txn->reference_no }}
                                    </h6>

                                    <div class="d-flex align-items-center item-list">
                                        <p class="text-gray-9">
                                            ₹{{ number_format($txn->amount, 2) }}
                                        </p>
                                        <p class="text-muted ms-2">
                                            {{ $txn->created_at->format('d M Y') }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="text-end">
                                <span
                                    class="badge 
                                                                {{ $txn->status == 'paid' ? 'badge-success' : 'badge-danger' }} badge-xs">
                                    {{ ucfirst($txn->status) }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted text-center">No transactions today</p>
                    @endforelse
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card border-0 shadow-lg premium-card">

                        <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="fw-bold mb-0">Business Overview</h5>
                                <small class="text-muted">Daily revenue insights (Smart Analytics)</small>
                            </div>

                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-gradient-primary px-3 py-2">
                                    {{ now()->format('F Y') }}
                                </span>
                            </div>
                        </div>

                        <div class="card-body">

                            {{-- TOP MINI STATS --}}
                            <div class="row mb-4 text-center">

                                <div class="col-md-3">
                                    <div class="mini-stat">
                                        <div class="mini-icon bg-success-soft">
                                            <i class="ti ti-trending-up"></i>
                                        </div>
                                        <h6 class="mb-0 mt-2">₹ {{ $data['month_total'] }}</h6>
                                        <small class="text-muted">Total</small>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mini-stat">
                                        <div class="mini-icon bg-primary-soft">
                                            <i class="ti ti-calendar"></i>
                                        </div>
                                        <h6 class="mb-0 mt-2">₹ {{ $data['today_total'] }}</h6>
                                        <small class="text-muted">Today</small>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mini-stat">
                                        <div class="mini-icon bg-warning-soft">
                                            <i class="ti ti-bolt"></i>
                                        </div>
                                        <h6 class="mb-0 mt-2">₹ {{ $data['peak_day'] }}</h6>
                                        <small class="text-muted">Peak Day</small>
                                    </div>
                                </div>

                                {{-- <div class="col-md-3">
                                    <div class="mini-stat">
                                        <div class="mini-icon bg-danger-soft">
                                            <i class="ti ti-chart-bar"></i>
                                        </div>
                                        <h6 class="mb-0 mt-2">₹ {{ $data['average'] }}</h6>
                                        <small class="text-muted">Average</small>
                                    </div>
                                </div> --}}

                            </div>

                            {{-- CHART --}}
                            <div class="chart-wrapper" style="height: 260px;">
                                <canvas id="monthlyBusinessChart"></canvas>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function () {

                    const ctx = document.getElementById('monthlyBusinessChart').getContext('2d');

                    const gradient = ctx.createLinearGradient(0, 0, 0, 300);
                    gradient.addColorStop(0, "rgba(78,115,223,0.4)");
                    gradient.addColorStop(1, "rgba(78,115,223,0)");

                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: [
                                @foreach($data['month_dates'] as $date)
                                    "{{ $date }}",
                                @endforeach
                    ],
                            datasets: [{
                                label: 'Revenue',
                                data: [
                                    @foreach($data['month_values'] as $val)
                                        {{ $val }},
                                    @endforeach
                        ],
                                borderColor: "#4e73df",
                                backgroundColor: gradient,
                                fill: true,
                                tension: 0.45,
                                pointRadius: 0,
                                pointHoverRadius: 6,
                                borderWidth: 3
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            interaction: {
                                intersect: false,
                                mode: 'index'
                            },
                            plugins: {
                                legend: { display: false },
                                tooltip: {
                                    backgroundColor: "#111",
                                    padding: 10,
                                    callbacks: {
                                        label: function (context) {
                                            return "₹ " + new Intl.NumberFormat().format(context.raw);
                                        }
                                    }
                                }
                            },
                            scales: {
                                x: {
                                    grid: { display: false }
                                },
                                y: {
                                    grid: {
                                        color: "rgba(0,0,0,0.05)"
                                    },
                                    ticks: {
                                        callback: val => "₹" + val
                                    }
                                }
                            }
                        }
                    });

                });
            </script>

            {{-- final rows (charts, categories etc.) --}}
            <div class="row mt-4">
                <div class="col-xxl-12 col-md-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="d-inline-flex align-items-center">
                                <span class="title-icon bg-soft-orange fs-16 me-2"><i class="ti ti-users"></i></span>
                                <h5 class="card-title mb-0">Top Categories</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                @foreach($topCategories as $cat)
                                    <div>
                                        <p class="fs-13 mb-1">{{ $cat->title }}</p>
                                        <h2 class="d-flex align-items-center">{{ $cat->products_count }}<span
                                                class="fs-13 fw-normal text-default ms-1">Products</span></h2>
                                    </div>
                                    <div>
                                        <canvas id="cat-{{ $cat->id }}" height="80" width="80"></canvas>
                                    </div>
                                @endforeach
                            </div>


                            <div class="border br-8 p-2">
                                <div class="d-flex align-items-center justify-content-between border-bottom p-2">
                                    <p class="mb-0">Total Number Of Categories</p>
                                    <h5>{{ $counts['categories'] ?? 0 }}</h5>
                                </div>
                                <div class="d-flex align-items-center justify-content-between p-2">
                                    <p class="mb-0">Total Number Of Products</p>
                                    <h5>{{ $counts['products'] ?? 0 }}</h5>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- <div class="col-xxl-8 col-md-6 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="d-inline-flex align-items-center">
                                <span class="title-icon bg-soft-indigo fs-16 me-2"><i class="ti ti-package"></i></span>
                                <h5 class="card-title mb-0">Order Statistics</h5>
                            </div>
                        </div>
                        <div class="card-body pb-0">
                            <div id="heat_chart"></div>
                        </div>
                    </div>
                </div> --}}

            </div>

        </div>

        <div class="copyright-footer d-flex align-items-center justify-content-between border-top bg-white gap-3 flex-wrap">
            <p class="fs-13 text-gray-9 mb-0">2026 &copy; {{ $site->site_name ?? config('app.name') }}. All Right Reserved
            </p>
            <p>Designed & Developed By <a href="javascript:void(0);" class="link-primary">ThiVen</a></p>
        </div>
    </div>
@endsection