<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Siswa - LaporSarana</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen p-4">
    <div class="w-full max-w-md bg-white border border-gray-200 rounded-xl shadow-sm p-8">
        <div class="text-center mb-8">
            <div class="w-12 h-12 bg-blue-600 text-white rounded-lg flex items-center justify-center font-bold text-2xl mx-auto mb-4 shadow-sm">S</div>
            <h2 class="text-2xl font-bold text-gray-900">Portal Siswa</h2>
            <p class="text-sm text-gray-500 mt-1">Masukkan NIS Anda untuk melanjutkan</p>
        </div>

        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6 text-sm font-medium text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('siswa.authenticate') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Induk Siswa (NIS)</label>
                <input type="number" name="nis" required placeholder="Contoh: 123123" class="w-full rounded-lg border-gray-200 bg-gray-50 text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 border p-2.5 outline-none transition-all">
            </div>
            <button type="submit" class="w-full flex justify-center items-center rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-blue-700 hover:shadow-md transition-all duration-200">
                Masuk ke Dasbor
            </button>
        </form>
    </div>
</body>
</html>