
@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')

<div class="dashboard-container">

<!-- WELCOME BANNER -->
<section class="dashboard-banner">

    <!-- Background Image -->
    <img
        src="{{ asset('images/yoi.jpg') }}"
        alt="NgopiDawg Coffee"
        class="banner-image"
    >

    <!-- Dark Overlay -->
    <div class="banner-overlay"></div>

    <!-- Banner Content -->
    <div class="banner-content">

        <p class="banner-label">
            WELCOME TO NGOPIDAWG
        </p>

        <h1>
            Manage Your Coffee Shop,
            <br>
            Serve Better Coffee.
        </h1>

        <p class="banner-description">
            Manage your coffee shop operations
            and keep everything running smoothly.
        </p>

        <a
            href="{{ route('pengelolaan', ['username' => request('username')]) }}"
            class="banner-button"
        >
            Manage Now
            <span>→</span>
        </a>

    </div>

</section>


<!-- TOP 3 BEST SELLING MENU -->

@php
    // Data sementara untuk contoh tampilan
    $topMenus = [
        [
            'rank' => 1,
            'name' => 'Cafe Latte',
            'category' => 'Coffee',
            'sold' => 128,
            'price' => 'Rp25.000',
            'image' => 'top1.webp',
        ],
        [
            'rank' => 2,
            'name' => 'Caramel Macchiato',
            'category' => 'Signature Coffee',
            'sold' => 96,
            'price' => 'Rp28.000',
            'image' => 'top2.jpg',
        ],
        [
            'rank' => 3,
            'name' => 'Spanish Latte',
            'category' => 'Coffee',
            'sold' => 82,
            'price' => 'Rp27.000',
            'image' => 'top3.jpg',
        ],
    ];
@endphp

<section class="top-menu-section">

    <!-- SECTION HEADING -->
    <div class="section-heading">

        <div>
            <p class="section-label">CUSTOMER FAVORITES</p>

            <h2>Top 3 Best Selling Menu</h2>

            <p class="section-description">
                Our most popular coffee selections this month.
            </p>
        </div>

        <span class="period-badge">
            <span>●</span> Last 30 Days
        </span>

    </div>


    <!-- PRODUCT CARDS -->
    <div class="top-menu-grid">

        @foreach ($topMenus as $menu)

            <div class="top-menu-card">

                <!-- PRODUCT IMAGE PLACEHOLDER -->
                <div class="top-menu-image">

                    <img
                        src="{{ asset('images/' . $menu['image']) }}"
                        alt="{{ $menu['name'] }}"
                        class="top-menu-photo"
                    >

                    <span class="menu-rank">
                        #{{ $menu['rank'] }}
                    </span>

                </div>



                <!-- PRODUCT INFORMATION -->
                <div class="top-menu-info">

                    <span class="menu-category">
                        {{ $menu['category'] }}
                    </span>

                    <h3>{{ $menu['name'] }}</h3>

                    <p class="menu-price">
                        {{ $menu['price'] }}
                    </p>


                    <!-- SALES INFORMATION -->
                    <div class="menu-sales">

                        <div>
                            <strong>{{ $menu['sold'] }}</strong>
                            <span> cups sold</span>
                        </div>

                        <span class="sales-label">
                            Best Seller
                        </span>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</section>




    <!-- SUMMARY STATISTICS -->

    @php
        // Mengambil data Total Menu dari Controller
        $totalMenu = collect($stats)->firstWhere('title', 'Total Menu');

        // Mengambil data Total Bahan Baku dari Controller
        $totalBahanBaku = collect($stats)->firstWhere('title', 'Bahan Baku');

        // Menghitung bahan baku dengan status Menipis atau Habis
        $stokMenipis = collect($stocks)->filter(function ($stock) {
            return in_array(strtolower($stock['status']), ['menipis', 'habis']);
        })->count();
    @endphp

    <div class="stats-grid">

        <!-- CARD 1: TOTAL MENU -->
        <div class="stat-card">

            <div class="stat-top">
                <span class="stat-icon"></span>
                <span class="stat-title">Total Menu</span>
            </div>

            <h2>{{ $totalMenu['value'] ?? 0 }}</h2>

            <p>Jumlah menu yang tersedia</p>

        </div>


        <!-- CARD 2: TOTAL BAHAN BAKU -->
        <div class="stat-card">

            <div class="stat-top">
                <span class="stat-icon"></span>
                <span class="stat-title">Total Bahan Baku</span>
            </div>

            <h2>{{ $totalBahanBaku['value'] ?? 0 }}</h2>

            <p>Jenis bahan baku terdaftar</p>

        </div>


        <!-- CARD 3: STOK MENIPIS -->
        <div class="stat-card">

            <div class="stat-top">
                <span class="stat-icon"></span>
                <span class="stat-title">Stok Menipis</span>
            </div>

            <h2>{{ $stokMenipis }}</h2>

            <p>Bahan baku perlu diperhatikan</p>

        </div>

    </div>



    <!-- Dashboard Content -->
    <div class="dashboard-content">

        <!-- Recent Activity -->
        <div class="dashboard-panel">

            <div class="panel-header">
                <h2>Recent Activity</h2>

                <span>Latest Updates</span>
            </div>

            <div class="activity-list">

                @foreach ($activities as $activity)

                    <div class="activity-item">

                        <div class="activity-dot"></div>

                        <div class="activity-info">

                            <h4>
                                {{ $activity['activity'] }}
                            </h4>

                            <p>
                                {{ $activity['detail'] }}
                            </p>

                        </div>

                        <span class="activity-time">
                            {{ $activity['time'] }}
                        </span>

                    </div>

                @endforeach

            </div>

        </div>


        <!-- Stock Overview -->
        <div class="dashboard-panel">

            <div class="panel-header">
                <h2>Stock Overview</h2>

                <span>Inventory Status</span>
            </div>

            <div class="stock-list">

                @foreach ($stocks as $stock)

                    <div class="stock-item">

                        <div>
                            <h4>{{ $stock['name'] }}</h4>

                            <p>{{ $stock['quantity'] }}</p>
                        </div>

                        <span class="stock-status
                            {{ strtolower($stock['status']) }}">
                            {{ $stock['status'] }}
                        </span>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</div>

@endsection


{{-- ==========================================
     RIGHT PANEL - SALES ANALYTICS
========================================== --}}

@section('right-panel')

<div class="analytics-sidebar">

    <!-- PANEL HEADER -->
    <div class="analytics-heading">
        <div>
            <p class="analytics-label">NGOPIDAWG INSIGHTS</p>
            <h2>Sales Analytics</h2>
        </div>

    <div class="analytics-profile">
        <img
            src="{{ asset('images/logo.png') }}"
            alt="NgopiDawg Logo">
    </div>
    </div>


    <!-- CHART 1: ITEMS SOLD -->
    <div class="analytics-card">

        <div class="analytics-card-header">
            <div>
                <h3>Items Sold</h3>
                <p>Monthly sales quantity</p>
            </div>

            <span class="chart-indicator">6M</span>
        </div>

        <div class="analytics-chart">
            <canvas id="itemsSoldChart"></canvas>
        </div>

        <div class="chart-footer">
            <span>Total items sold</span>
            <strong>2,960 items</strong>
        </div>

    </div>


    <!-- CHART 2: MONTHLY REVENUE -->
    <div class="analytics-card">

        <div class="analytics-card-header">
            <div>
                <h3>Monthly Revenue</h3>
                <p>Revenue performance</p>
            </div>

            <span class="chart-indicator">6M</span>
        </div>

        <div class="analytics-chart">
            <canvas id="revenueChart"></canvas>
        </div>

        <div class="chart-footer">
            <span>Total revenue</span>
            <strong>Rp75,8 jt</strong>
        </div>

    </div>


    <!-- INFORMATION -->
    <div class="analytics-note">
        <span></span>

        <p>
            Sales analytics helps you monitor
            your coffee shop performance.
        </p>
    </div>

</div>


<!-- CHART.JS LIBRARY -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<!-- CHART CONFIGURATION -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    // LABEL BULAN
    const months = ['Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov'];


    // ==================================
    // CHART 1: ITEMS SOLD
    // ==================================

    const itemsCanvas = document.getElementById('itemsSoldChart');

    if (itemsCanvas) {

        new Chart(itemsCanvas, {
            type: 'bar',

            data: {
                labels: months,

                datasets: [{
                    label: 'Items Sold',

                    data: [320, 410, 380, 520, 610, 720],

                    backgroundColor: '#8B5735',

                    hoverBackgroundColor: '#4B3026',

                    borderRadius: 6,

                    barThickness: 13
                }]
            },

            options: {
                responsive: true,

                maintainAspectRatio: false,

                plugins: {
                    legend: {
                        display: false
                    }
                },

                scales: {
                    y: {
                        beginAtZero: true,

                        ticks: {
                            font: {
                                size: 9
                            }
                        },

                        grid: {
                            color: '#F0E8E1'
                        }
                    },

                    x: {
                        ticks: {
                            font: {
                                size: 9
                            }
                        },

                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

    }


    // ==================================
    // CHART 2: MONTHLY REVENUE
    // ==================================

    const revenueCanvas = document.getElementById('revenueChart');

    if (revenueCanvas) {

        new Chart(revenueCanvas, {
            type: 'line',

            data: {
                labels: months,

                datasets: [{
                    label: 'Revenue',

                    data: [8.2, 10.5, 9.8, 13.4, 15.2, 18.7],

                    borderColor: '#8B5735',

                    backgroundColor: 'rgba(139, 87, 53, 0.12)',

                    fill: true,

                    tension: 0.4,

                    pointRadius: 3,

                    pointBackgroundColor: '#4B3026',

                    pointBorderColor: '#FFFFFF',

                    pointBorderWidth: 2
                }]
            },

            options: {
                responsive: true,

                maintainAspectRatio: false,

                plugins: {
                    legend: {
                        display: false
                    },

                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return 'Rp' + context.parsed.y.toFixed(1) + ' juta';
                            }
                        }
                    }
                },

                scales: {
                    y: {
                        beginAtZero: true,

                        ticks: {
                            font: {
                                size: 9
                            },

                            callback: function(value) {
                                return 'Rp' + value + ' jt';
                            }
                        },

                        grid: {
                            color: '#F0E8E1'
                        }
                    },

                    x: {
                        ticks: {
                            font: {
                                size: 9
                            }
                        },

                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

    }

});
</script>

@endsection
