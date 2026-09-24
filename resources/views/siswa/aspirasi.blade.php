<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Laporan - LaporSarana</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased flex h-screen overflow-hidden">

    <!-- Sidebar Siswa (Navigasi aktif pindah ke Buat Laporan) -->
    <aside class="w-64 bg-white border-r border-gray-200 flex flex-col shrink-0">
        <div class="h-16 flex items-center px-6 border-b border-gray-200">
            <div class="w-8 h-8 bg-blue-600 text-white rounded flex items-center justify-center font-bold text-lg shadow-sm mr-3">S</div>
            <div class="font-bold text-xl tracking-tight text-gray-900">Portal Siswa</div>
        </div>
        
        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <a href="{{ route('siswa.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg font-medium transition-colors">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Dasbor & Histori
            </a>
            <a href="{{ route('siswa.aspirasi.index') }}" class="flex items-center gap-3 px-3 py-2.5 bg-blue-50 text-blue-700 rounded-lg font-medium transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                Buat Laporan Baru
            </a>
        </nav>

        <div class="p-4 border-t border-gray-200">
            <a href="{{ route('siswa.logout') }}" class="flex items-center justify-center gap-2 w-full px-4 py-2 text-sm font-medium text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition-colors">
                Keluar
            </a>
        </div>
    </aside>

    <!-- Konten Utama Form -->
    <main class="flex-1 flex flex-col h-screen overflow-y-auto bg-gray-50">
        <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-8 sticky top-0 z-10 shrink-0">
            <h1 class="text-lg font-semibold text-gray-800">Input Pengaduan</h1>
            <div class="text-sm font-medium text-gray-500 bg-gray-100 px-3 py-1.5 rounded-full border border-gray-200">
                NIS: <span class="font-bold text-gray-800">{{ session('siswa_nis') ?? 'Mode Tamu' }}</span>
            </div>
        </header>

        <div class="p-8 flex items-start justify-center min-h-[calc(100vh-4rem)]">
            <div class="max-w-xl w-full bg-white border border-gray-200 rounded-xl shadow-sm p-8 mt-4">
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold text-gray-900">Kirim Aspirasi Baru</h2>
                    <p class="text-sm text-gray-500 mt-2">Sampaikan laporan terkait sarana dan prasarana sekolah dengan jelas.</p>
                </div>

                @if(session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 text-sm font-medium flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6 text-sm">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('siswa.aspirasi.store') }}" method="POST" class="space-y-5">
                    @csrf
                    <!-- Auto-fill NIS jika siswa sudah login -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Induk Siswa (NIS)</label>
                        <input type="number" name="nis" required value="{{ session('siswa_nis') }}" {{ session('siswa_nis') ? 'readonly' : '' }} class="w-full rounded-lg border-gray-200 bg-gray-50 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 border p-2.5 outline-none transition-all {{ session('siswa_nis') ? 'cursor-not-allowed opacity-80' : 'hover:bg-white hover:border-gray-300' }}">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kategori Pengaduan</label>
                        <select name="id_kategori" required class="w-full rounded-lg border-gray-200 bg-gray-50 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 border p-2.5 outline-none transition-all hover:bg-white hover:border-gray-300 cursor-pointer">
                            <option value="1">1 - Kerusakan Fasilitas</option>
                            <option value="2">2 - Kebersihan Lingkungan</option>
                            <option value="3">3 - Keamanan & Ketertiban</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi Kejadian</label>
                        <input type="text" name="lokasi" maxlength="50" required placeholder="Cth: Kelas XII RPL 1, Kamar Mandi Pria" class="w-full rounded-lg border-gray-200 bg-gray-50 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 border p-2.5 outline-none transition-all hover:bg-white hover:border-gray-300">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Keterangan Lengkap</label>
                        <textarea name="ket" maxlength="50" required rows="3" placeholder="Jelaskan detail kerusakan atau masalah di sini..." class="w-full rounded-lg border-gray-200 bg-gray-50 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 border p-2.5 outline-none transition-all hover:bg-white hover:border-gray-300 resize-none"></textarea>
                    </div>

                    <button type="submit" class="w-full flex justify-center items-center rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-blue-700 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200 mt-2">
                        Kirim Laporan
                    </button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>