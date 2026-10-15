use Illuminate\Support\Facades\Route;

// Endpoint API Dosen
Route::get('/dosen', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'Daftar data dosen',
        'data' => [
            // Dummy data atau ambil dari model Database nantinya
            ['nidn' => '1234567890', 'nama' => 'Dosen A'],
        ]
    ]);
});