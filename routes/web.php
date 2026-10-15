<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Beranda & Profil (Bisa diarahkan ke view atau controller yang sama)
Route::get('/', function () {
    return view('beranda'); // Buat file resources/views/beranda.blade.php
});
Route::get('/profil', function () {
    return view('beranda'); 
});

// Daftar dosen + filter (Menangkap query string ?keahlian=...)
Route::get('/dosen', function (Request $request) {
    $keahlian = $request->query('keahlian');
    return "Menampilkan daftar dosen. Filter keahlian: " . ($keahlian ?? 'Tidak ada');
});

// Detail Dosen dengan constraint NIDN harus tepat 10 digit angka
Route::get('/dosen/{nidn}', function ($nidn) {
    return "Menampilkan profil dosen dengan NIDN: " . $nidn;
})->where('nidn', '[0-9]{10}');

// Berita dengan parameter kategori opsional (default: "terbaru")
Route::get('/berita/{kategori?}', function ($kategori = 'terbaru') {
    return "Menampilkan berita kategori: " . $kategori;
});

// Grup Route untuk Admin (Prefix: /admin)
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return "Halaman Dashboard Admin";
    });
    
    Route::get('/pengaturan', function () {
        return "Halaman Pengaturan Admin";
    });
});

// Fallback Route untuk Halaman 404 Kustom (URL lain)
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});