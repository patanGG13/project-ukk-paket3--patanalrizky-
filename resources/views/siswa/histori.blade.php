<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori Aspirasi Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased min-h-screen flex flex-col">
    
    <!-- Navbar Minimalis -->
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-blue-600 text-white rounded flex items-center justify-center font-bold text-lg shadow-sm">S</div>
                    <div class="font-bold text-xl tracking-tight text-gray-900">LaporSarana</div>
                </div>
                <div class="flex gap-6">
                    <a href="{{ route('siswa.aspirasi.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-900 transition-colors duration-200">Kirim Aspirasi</a>
                    <a href="{{ route('siswa.histori') }}" class="text-sm font-semibold text-blue-600">Cek Histori</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">
        
        <div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Histori Pengaduan</h2>
                <p class="text-gray-500 text-sm mt-1">Pantau status penyelesaian dari aspirasi yang telah Anda kirimkan.</p>
            </div>
            
            <!-- Form Pencarian -->
            <form action="{{ route('siswa.histori') }}" method="GET" class="flex gap-2 w-full sm:w-auto">
                <input type="number" name="nis" placeholder="Masukkan NIS Anda..." required value="{{ request('nis') }}" class="w-full sm:w-64 rounded-lg border-gray-200 bg-white text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 border p-2 outline-none transition-all shadow-sm text-sm">
                <button type="submit" class="flex-shrink-0 inline-flex justify-center items-center rounded-lg bg-blue-600 px-5 py-2 text-sm font-medium text-white hover:bg-blue-700 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                    Cari
                </button>
            </form>
        </div>

        @if(request()->has('nis'))
            <!-- Tabel Minimalis -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50/80">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">ID Laporan</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Kategori & Lokasi</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Keterangan</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Umpan Balik</th>
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
                                        <svg class="w-3.5 h-3.5 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        {{ $data->lokasi }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 align-top text-sm text-gray-600 break-words">
                                    {{ $data->ket }}
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
                                <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                    <p class="text-sm font-medium">Tidak ada histori pengaduan untuk NIS ini.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</body>
</html>