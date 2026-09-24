<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - LaporSarana</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-md bg-white border border-gray-200 rounded-xl shadow-sm p-8">
        <div class="text-center mb-8">
            <div class="w-12 h-12 bg-gray-800 text-white rounded-lg flex items-center justify-center font-bold text-2xl mx-auto mb-4 shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-900">Portal Admin</h2>
            <p class="text-sm text-gray-500 mt-1">Masuk untuk mengelola aspirasi sekolah</p>
        </div>

        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6 text-sm font-medium text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                <input type="text" name="username" required class="w-full rounded-lg border-gray-200 bg-gray-50 text-gray-900 focus:ring-2 focus:ring-gray-800 focus:border-gray-800 border p-2.5 outline-none transition-all">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" required class="w-full rounded-lg border-gray-200 bg-gray-50 text-gray-900 focus:ring-2 focus:ring-gray-800 focus:border-gray-800 border p-2.5 outline-none transition-all">
            </div>

            <button type="submit" class="w-full flex justify-center items-center rounded-lg bg-gray-800 px-4 py-2.5 text-sm font-medium text-white hover:bg-gray-900 hover:shadow-md transition-all duration-200 mt-2">
                Masuk
            </button>
        </form>
    </div>

</body>
</html>