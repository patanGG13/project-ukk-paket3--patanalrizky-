<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Laporan - LaporSarana</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased flex h-screen overflow-hidden">

    <!-- Sidebar (Sama persis, namun tab aktif berpindah) -->
    <aside class="w-64 bg-white border-r border-gray-200 flex flex-col shrink-0">
        <div class="h-16 flex items-center px-6 border-b border-gray-200">
            <div class="w-8 h-8 bg-blue-600 text-white rounded flex items-center justify-center font-bold text-lg shadow-sm mr-3">A</div>
            <div class="font-bold text-xl tracking-tight text-gray-900">AdminPanel</div>
        </div>
        
        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg font-medium transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Dasbor
            </a>
            <a href="{{ route('admin.laporan') }}" class="flex items-center gap-3 px-3 py-2.5 bg-blue-50 text-blue-700 rounded-lg font-medium transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                Daftar Laporan
            </a>
        </nav>

        <div class="p-4 border-t border-gray-200">
            <a href="{{ route('admin.logout') }}" class="flex items-center justify-center gap-2 w-full px-4 py-2 text-sm font-medium text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition-colors">
                Keluar
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-screen overflow-y-auto bg-gray-50">
        <header class="h-16 bg-white border-b border-gray-200 flex items-center px-8 sticky top-0 z-10 shrink-0">
            <h1 class="text-lg font-semibold text-gray-800">Manajemen Pengaduan</h1>
        </header>

        <div class="p-8">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-900">Daftar Laporan Masuk</h2>
                <p class="text-gray-500 text-sm mt-1">Kelola aspirasi dan berikan umpan balik dengan mudah.</p>
            </div>

            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 text-sm font-medium flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tabel Minimalis (Kode Tabel yang sama) -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50/80">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Pelaporan</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Kategori & Lokasi</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider w-1/3">Detail Aduan</th>
                            <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($daftarAduan as $aduan)
                            <tr class="hover:bg-gray-50/80 transition-colors duration-200 group">
                                <td class="px-6 py-4 align-top">
                                    <div class="font-semibold text-blue-600">#{{ $aduan->id_pelaporan }}</div>
                                    <div class="text-gray-500 text-sm mt-1">NIS: <span class="font-medium text-gray-700">{{ $aduan->nis }}</span></div>
                                </td>
                                
                                <td class="px-6 py-4 align-top">
                                    <div class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-gray-100 text-gray-700 border border-gray-200 mb-2">
                                        {{ $aduan->kategori->ket_kategori ?? 'Umum' }}
                                    </div>
                                    <div class="text-gray-600 text-sm flex items-start gap-1.5 mt-1">
                                        <svg class="w-4 h-4 text-gray-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z"></path></svg>
                                        {{ $aduan->lokasi }}
                                    </div>
                                </td>
                                
                                <td class="px-6 py-4 align-top text-sm text-gray-600 leading-relaxed">
                                    {{ $aduan->ket }}
                                </td>
                                
                                <td class="px-6 py-4 align-top">
                                    <form action="{{ route('admin.aspirasi.update', $aduan->id_pelaporan) }}" method="POST" class="flex flex-col gap-2 items-end">
                                        @csrf
                                        <div class="flex gap-2">
                                            <select name="status" required class="block w-28 rounded-lg border-gray-200 bg-gray-50 text-sm text-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 hover:bg-white hover:border-gray-300 transition-all cursor-pointer border p-2 outline-none">
                                                <option value="Menunggu" {{ $aduan->aspirasi->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                                <option value="Proses" {{ $aduan->aspirasi->status == 'Proses' ? 'selected' : '' }}>Proses</option>
                                                <option value="Selesai" {{ $aduan->aspirasi->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                            </select>
                                            <input type="number" name="feedback" value="{{ $aduan->aspirasi->feedback ?? '' }}" placeholder="Skor" required class="block w-20 rounded-lg border-gray-200 bg-gray-50 text-sm text-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 hover:bg-white hover:border-gray-300 transition-all border p-2 outline-none text-center">
                                        </div>
                                        <button type="submit" class="w-full sm:w-auto inline-flex justify-center items-center rounded-lg bg-blue-600 px-5 py-2 text-sm font-medium text-white hover:bg-blue-700 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                                            Simpan
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-16 text-center text-gray-500">
                                    <p class="text-sm font-medium text-gray-600">Belum ada data aspirasi</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>