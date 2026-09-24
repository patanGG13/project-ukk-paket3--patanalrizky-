<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InputAspirasi;
use App\Models\Aspirasi;

class AdminController extends Controller
{
    // 1. Halaman Dasbor Utama (Hanya Welcome)
    public function index(Request $request)
    {
        if (!$request->session()->has('admin_logged_in')) {
            return redirect()->route('admin.login')->withErrors(['msg' => 'Silakan login terlebih dahulu.']);
        }

        return view('admin.dashboard');
    }

    // 2. Halaman Daftar Laporan
    public function laporan(Request $request)
    {
        if (!$request->session()->has('admin_logged_in')) {
            return redirect()->route('admin.login')->withErrors(['msg' => 'Silakan login terlebih dahulu.']);
        }

        $query = InputAspirasi::with(['siswa', 'kategori']);

        if ($request->has('kategori')) {
            $query->where('id_kategori', $request->kategori);
        }

        $daftarAduan = $query->get();
        return view('admin.laporan', compact('daftarAduan'));
    }

    // 3. Fungsi Update Status (Tetap sama)
    public function updateStatus(Request $request, $id_aspirasi)
    {
        if (!$request->session()->has('admin_logged_in')) {
            return redirect()->route('admin.login')->withErrors(['msg' => 'Silakan login terlebih dahulu.']);
        }

        $request->validate([
            'status' => 'required|in:Menunggu,Proses,Selesai',
            'feedback' => 'required|integer' 
        ]);

        $aspirasi = Aspirasi::where('id_aspirasi', $id_aspirasi)->firstOrFail();
        $aspirasi->update([
            'status' => $request->status,
            'feedback' => $request->feedback
        ]);

        return redirect()->back()->with('success', 'Status aspirasi berhasil diperbarui.');
    }
}