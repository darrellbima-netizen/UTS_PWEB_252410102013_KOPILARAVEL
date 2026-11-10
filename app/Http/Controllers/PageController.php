<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Halaman Login
    public function login()
    {
        return view('login');
    }

/////////////////////////////////////////////////////////////////////////////////////////////

// Halaman Dashboard
    public function dashboard(Request $request)
    {
        // Mengambil username dari URL
        $username = $request->query('username', 'Guest');

        // Data statistik coffee shop
        $stats = [
            [
                'title' => 'Total Menu',
                'value' => '12',
                'icon' => '☕',
                'description' => 'Menu tersedia'
            ],
            [
                'title' => 'Total Penjualan',
                'value' => 'Rp2.450.000',
                'icon' => '💰',
                'description' => 'Penjualan bulan ini'
            ],
            [
                'title' => 'Bahan Baku',
                'value' => '8',
                'icon' => '📦',
                'description' => 'Jenis bahan baku'
            ],
            [
                'title' => 'Menu Terlaris',
                'value' => 'Cafe Latte',
                'icon' => '🏆',
                'description' => 'Menu paling populer'
            ]
        ];

        // Data aktivitas terbaru
        $activities = [
            [
                'activity' => 'Penambahan menu baru',
                'detail' => 'Caramel Macchiato',
                'time' => '10 menit lalu'
            ],
            [
                'activity' => 'Pembaruan stok',
                'detail' => 'Biji kopi Arabica',
                'time' => '30 menit lalu'
            ],
            [
                'activity' => 'Pembaruan harga',
                'detail' => 'Cafe Latte',
                'time' => '1 jam lalu'
            ],
            [
                'activity' => 'Pembaruan inventaris',
                'detail' => 'Susu Fresh Milk',
                'time' => '2 jam lalu'
            ]
        ];

        // Data ringkasan stok
        $stocks = [
            [
                'name' => 'Biji Kopi Arabica',
                'quantity' => '5 kg',
                'status' => 'Tersedia'
            ],
            [
                'name' => 'Fresh Milk',
                'quantity' => '12 liter',
                'status' => 'Tersedia'
            ],
            [
                'name' => 'Gula Pasir',
                'quantity' => '3 kg',
                'status' => 'Menipis'
            ],
            [
                'name' => 'Sirup Caramel',
                'quantity' => '0 botol',
                'status' => 'Habis'
            ]
        ];

        // Mengirim data ke halaman Dashboard
        return view('dashboard', compact(
            'username',
            'stats',
            'activities',
            'stocks'
        ));
    }

////////////////////////////////////////////////////////////////////////////////////////////////

    // Halaman Pengelolaan
    public function pengelolaan(Request $request)
    {
        // Mengambil username dari URL
        $username = $request->query('username', 'Guest');

        // Data menu coffee shop
        $menus = [
            [
                'name' => 'Espresso',
                'category' => 'Coffee',
                'price' => 18000,
                'status' => 'Tersedia'
            ],
            [
                'name' => 'Americano',
                'category' => 'Coffee',
                'price' => 20000,
                'status' => 'Tersedia'
            ],
            [
                'name' => 'Cafe Latte',
                'category' => 'Coffee',
                'price' => 25000,
                'status' => 'Tersedia'
            ],
            [
                'name' => 'Cappuccino',
                'category' => 'Coffee',
                'price' => 23000,
                'status' => 'Tersedia'
            ],
            [
                'name' => 'Caramel Macchiato',
                'category' => 'Coffee',
                'price' => 28000,
                'status' => 'Habis'
            ],
            [
                'name' => 'Matcha Latte',
                'category' => 'Non-Coffee',
                'price' => 24000,
                'status' => 'Tersedia'
            ],
            [
                'name' => 'Chocolate',
                'category' => 'Non-Coffee',
                'price' => 22000,
                'status' => 'Tersedia'
            ],
            [
                'name' => 'Strawberry Tea',
                'category' => 'Non-Coffee',
                'price' => 20000,
                'status' => 'Habis'
            ]
        ];

        // Data bahan baku coffee shop
        $ingredients = [
            [
                'name' => 'Biji Kopi Arabica',
                'stock' => 5,
                'unit' => 'kg',
                'status' => 'Tersedia'
            ],
            [
                'name' => 'Fresh Milk',
                'stock' => 12,
                'unit' => 'liter',
                'status' => 'Tersedia'
            ],
            [
                'name' => 'Gula Pasir',
                'stock' => 3,
                'unit' => 'kg',
                'status' => 'Menipis'
            ],
            [
                'name' => 'Sirup Caramel',
                'stock' => 0,
                'unit' => 'botol',
                'status' => 'Habis'
            ],
            [
                'name' => 'Matcha Powder',
                'stock' => 2,
                'unit' => 'kg',
                'status' => 'Menipis'
            ],
            [
                'name' => 'Cokelat Bubuk',
                'stock' => 4,
                'unit' => 'kg',
                'status' => 'Tersedia'
            ]
        ];

        // Menghitung jumlah menu dan bahan baku
        $totalMenus = count($menus);
        $totalIngredients = count($ingredients);

        // Mengirim data menuju halaman Pengelolaan
        return view('pengelolaan', compact(
            'username',
            'menus',
            'ingredients',
            'totalMenus',
            'totalIngredients'
        ));
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // Halaman Profile
    public function profile(Request $request)
    {
        // Mengambil username dari URL
        $username = $request->query('username', 'Guest');

        // Membuat data profil pengguna
        $profile = [
            'name' => ucfirst($username),

            'username' => $username,

            'email' => strtolower($username) . '@ngopidawg.com',

            'role' => 'Administrator',

            'coffee_shop' => 'NgopiDawg Coffee House',

            'joined' => 'November 2026',

            'description' => 'Pengelola coffee shop NgopiDawg yang berfokus pada penyajian kopi berkualitas dengan suasana nyaman dan pelayanan terbaik.'
        ];

        // Mengirim data menuju halaman Profile
        return view('profile', compact(
            'username',
            'profile'
        ));
    }

///////////////////////////////////////////////////////////////////////////////////////////////////

    public function loginProcess(Request $request)
    {
        // Validasi username dan password
        $request->validate([
            'username' => 'required|string|max:30',
            'password' => 'required',
        ]);

        // Mengambil username dari form
        $username = $request->input('username');

        // Mengarahkan pengguna ke Dashboard
        return redirect()->route('dashboard', [
            'username' => $username
        ]);
    }

}
