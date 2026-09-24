<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Masuk - LaporSarana</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 flex flex-col items-center justify-center min-h-screen p-4">

    <!-- Header Portal -->
    <div class="text-center mb-12">
        <div class="w-16 h-16 bg-blue-600 text-white rounded-2xl flex items-center justify-center font-bold text-3xl mx-auto mb-5 shadow-md">LS</div>
        <h1 class="text-3xl font-extrabold text-gray-900">LaporSarana Sekolah</h1>
        <p class="text-gray-500 mt-2 text-sm sm:text-base">Sistem Layanan Pengaduan Sarana & Prasarana</p>
    </div>

    <!-- Pilihan Login -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full max-w-4xl px-4">
        
        <!-- Kartu Pilihan Siswa -->
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-8 text-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-5">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14v6.5"></path>
                </svg>
            </div>
            <h2 class="text-xl font-bold text-gray-900 mb-2">Portal Siswa</h2>
            <p class="text-gray-500 text-sm mb-8 px-2">Gunakan Nomor Induk Siswa (NIS) Anda untuk membuat laporan atau mengecek histori aduan.</p>
            <a href="{{ route('siswa.login') }}" class="block w-full rounded-xl bg-blue-600 px-4 py-3 text-sm font-semibold text-white hover:bg-blue-700 transition-colors">
                Masuk sebagai Siswa
            </a>
        </div>

        <!-- Kartu Pilihan Admin -->
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-8 text-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            <div class="w-16 h-16 bg-gray-50 text-gray-700 rounded-full flex items-center justify-center mx-auto mb-5">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h2 class="text-xl font-bold text-gray-900 mb-2">Portal Admin</h2>
            <p class="text-gray-500 text-sm mb-8 px-2">Masuk menggunakan kata sandi petugas untuk mengelola, meninjau, dan memproses aspirasi.</p>
            <a href="{{ route('admin.login') }}" class="block w-full rounded-xl bg-gray-800 px-4 py-3 text-sm font-semibold text-white hover:bg-gray-900 transition-colors">
                Masuk sebagai Petugas
            </a>
        </div>

    </div>

    <!-- Footer -->
    <div class="mt-12 text-sm text-gray-400 font-medium">
        &copy; 2026 Aplikasi Pengaduan Sarana Sekolah.
    </div>

</body>
</html>