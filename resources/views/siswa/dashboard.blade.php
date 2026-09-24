<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasbor Siswa - LaporSarana</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased flex h-screen overflow-hidden">

    <!-- Sidebar Siswa -->
    <aside class="w-64 bg-white border-r border-gray-200 flex flex-col shrink-0">
        <div class="h-16 flex items-center px-6 border-b border-gray-200">
            <div class="w-8 h-8 bg-blue-600 text-white rounded flex items-center justify-center font-bold text-lg shadow-sm mr-3">S</div>
            <div class="font-bold text-xl tracking-tight text-gray-900">Portal Siswa</div>
        </div>
        
        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <a href="{{ route('siswa.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 bg-blue-50 text-blue-700 rounded-lg font-medium transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Dasbor & Histori
            </a>
            <a href="{{ route('siswa.aspirasi.index') }}" class="flex items-center gap-3 px-3 py-2.5 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg font-medium transition-colors">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                Buat Laporan Baru
            </a>
        </nav>

        <div class="p-4 border-t border-gray-200">
            <a href="{{ route('siswa.logout') }}" class="flex items-center justify-center gap-2 w-full px-4 py-2 text-sm font-medium text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition-colors">
                Keluar
            </a>
        </div>
    </aside>

    <!-- Konten Utama -->
    <main class="flex-1 flex flex-col h-screen overflow-y-auto bg-gray-50">
        <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-8 sticky top-0 z-10 shrink-0">
            <h1 class="text-lg font-semibold text-gray-800">Histori Pengaduan</h1>
            <div class="text-sm font-medium text-gray-500 bg-gray-100 px-3 py-1.5 rounded-full border border-gray-200">
                NIS: <span class="font-bold text-gray-800">{{ session('siswa_nis') }}</span>
            </div>
        </header>

        <div class="p-8">
            <div class="mb-6 flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">Dasbor Aspirasi Anda</h2>
                    <p class="text-gray-500 text-sm mt-1">Pantau status laporan yang telah Anda kirimkan.</p>
                </div>
                <a href="{{ route('siswa.aspirasi.index') }}" class="inline-flex justify-center items-center rounded-lg bg-blue-600 px-5 py-2 text-sm font-medium text-white hover:bg-blue-700 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                    + Buat Laporan
                </a>
            </div>

            <!-- Tabel Histori Laporan -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50/80">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">ID Laporan</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Kategori & Lokasi</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Umpan Balik Admin</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($histori as $data)
                            <tr class="hover:bg-gray-50/80 transition-colors duration-200">
                                <td class="px-6 py-4 align-top whitespace-nowrap text-sm font-semibold text-blue-600">
                                    #{{ $data->id_pelaporan }}
                                </td>
                                <td class="px-6 py-4 align-top">
                                    <div class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-gray-100 text-gray-700 border border-gray-200 mb-1.5">
                                        {{ $data->ket_kategori }}
                                    </div>
                                    <div class="text-gray-500 text-xs flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z"></path></svg>
                                        {{ $data->lokasi }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 align-top">
                                    @if($data->status == 'Selesai')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">Selesai</span>
                                    @elseif($data->status == 'Proses')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 border border-yellow-200">Proses</span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 border border-gray-200">Menunggu</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 align-top text-sm font-medium {{ $data->feedback == '0' ? 'text-gray-400' : 'text-blue-600' }}">
                                    {{ $data->feedback == '0' ? 'Belum ada tanggapan' : $data->feedback }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                                    <p class="text-sm font-medium">Anda belum pernah membuat laporan.</p>
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