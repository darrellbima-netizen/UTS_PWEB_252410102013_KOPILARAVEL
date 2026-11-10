
@extends('layouts.dashboard')

@section('title', 'Pengelolaan')

@section('content')

<div class="management-container">

    <!-- PAGE HEADER -->
    <div class="management-header">

        <div>
            <p class="management-label">MANAGEMENT CENTER</p>

            <h1>Pengelolaan</h1>

            <p>
                Manage your coffee shop menu and inventory
                in one place.
            </p>
        </div>

        <div class="management-brand">
             NgopiDawg Coffee House
        </div>

    </div>


    <!-- SUMMARY CARDS -->
    <div class="management-summary">

        <div class="summary-card">

            <div class="summary-icon"></div>

            <div>
                <p>Total Menu</p>
                <h2>{{ $totalMenus }}</h2>
                <span>Menu terdaftar</span>
            </div>

        </div>

        <div class="summary-card">

            <div class="summary-icon"></div>

            <div>
                <p>Total Bahan Baku</p>
                <h2>{{ $totalIngredients }}</h2>
                <span>Jenis bahan baku</span>
            </div>

        </div>

        <div class="summary-card">

            <div class="summary-icon"></div>

            <div>
                <p>Stok Perlu Perhatian</p>

                <h2>
                    {{ collect($ingredients)->where('status', 'Menipis')->count()
                    + collect($ingredients)->where('status', 'Habis')->count() }}
                </h2>

                <span>Perlu pengecekan</span>
            </div>

        </div>

    </div>


    <!-- MENU MANAGEMENT -->
    <div class="management-panel">

        <div class="management-panel-header">

            <div>
                <h2>Menu Management</h2>

                <p>
                    Daftar menu dan harga produk NgopiDawg.
                </p>
            </div>

            <span class="total-badge">
                {{ $totalMenus }} Menu
            </span>

        </div>


        <div class="table-wrapper">

            <table class="management-table">

                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Menu</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($menus as $index => $menu)

                        <tr>

                            <td>{{ $index + 1 }}</td>

                            <td class="product-name">
                                {{ $menu['name'] }}
                            </td>

                            <td>
                                {{ $menu['category'] }}
                            </td>

                            <td>
                                Rp{{ number_format($menu['price'], 0, ',', '.') }}
                            </td>

                            <td>
                                <span class="status-badge
                                    {{ strtolower($menu['status']) }}">
                                    {{ $menu['status'] }}
                                </span>
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>


    <!-- INVENTORY MANAGEMENT -->
    <div class="management-panel">

        <div class="management-panel-header">

            <div>
                <h2>Inventory Management</h2>

                <p>
                    Pantau persediaan bahan baku coffee shop.
                </p>
            </div>

            <span class="total-badge">
                {{ $totalIngredients }} Bahan
            </span>

        </div>


        <div class="table-wrapper">

            <table class="management-table">

                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Bahan</th>
                        <th>Jumlah Stok</th>
                        <th>Satuan</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($ingredients as $index => $ingredient)

                        <tr>

                            <td>{{ $index + 1 }}</td>

                            <td class="product-name">
                                {{ $ingredient['name'] }}
                            </td>

                            <td>
                                {{ $ingredient['stock'] }}
                            </td>

                            <td>
                                {{ $ingredient['unit'] }}
                            </td>

                            <td>
                                <span class="status-badge
                                    {{ strtolower($ingredient['status']) }}">
                                    {{ $ingredient['status'] }}
                                </span>
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
