<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InputAspirasi;
use App\Models\Aspirasi;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    // ==========================================
    // 1. FITUR INPUT ASPIRASI & PENCARIAN
    // ==========================================

    // Menampilkan form input pengaduan
    public function index()
    {
        return view('siswa.aspirasi');
    }

    // Menyimpan data pengaduan ke database
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|integer',
            'id_kategori' => 'required',
            'lokasi' => 'required|string|max:50',
            'ket' => 'required|string|max:50',
        ]);

        // Generate ID Pelaporan secara random (atau auto-increment)
        $id_pelaporan = rand(10000, 99999);

        // Simpan ke tabel input_aspirasis
        InputAspirasi::create([
            'id_pelaporan' => $id_pelaporan,
            'nis' => $request->nis,
            'id_kategori' => $request->id_kategori,
            'lokasi' => $request->lokasi,
            'ket' => $request->ket,
        ]);

        // Simpan status awal ke tabel aspirasis
        Aspirasi::create([
            'id_aspirasi' => $id_pelaporan,
            'status' => 'Menunggu',
            'id_kategori' => $request->id_kategori,
            'feedback' => 0 
        ]);

        return redirect()->back()->with('success', 'Laporan aspirasi berhasil dikirim!');
    }

    // Menampilkan halaman pencarian histori (tanpa login)
    public function histori(Request $request)
    {
        $histori = [];
        
        if ($request->has('nis')) {
            $histori = DB::table('input_aspirasis')
                ->join('aspirasis', 'input_aspirasis.id_pelaporan', '=', 'aspirasis.id_aspirasi')
                ->join('kategoris', 'input_aspirasis.id_kategori', '=', 'kategoris.id_kategori')
                ->where('input_aspirasis.nis', $request->nis)
                ->get();
        }

        return view('siswa.histori', compact('histori'));
    }

    // ==========================================
    // 2. FITUR AUTENTIKASI & DASBOR SISWA
    // ==========================================

    // Menampilkan halaman form login NIS
    public function login()
    {
        return view('siswa.login');
    }

    // Memproses validasi NIS untuk login
    public function authenticate(Request $request)
    {
        $request->validate(['nis' => 'required|integer']);

        $siswa = Siswa::where('nis', $request->nis)->first();

        if ($siswa) {
            $request->session()->put('siswa_nis', $siswa->nis);
            $request->session()->put('siswa_kelas', $siswa->kelas);
            
            return redirect()->route('siswa.dashboard');
        }

        return back()->withErrors(['msg' => 'NIS tidak terdaftar di sistem sekolah!']);
    }

    // Menampilkan halaman Dasbor Khusus Siswa
    public function dashboard(Request $request)
    {
        // Proteksi halaman agar hanya bisa diakses setelah login NIS
        if (!$request->session()->has('siswa_nis')) {
            return redirect()->route('siswa.login')->withErrors(['msg' => 'Silakan masukkan NIS terlebih dahulu.']);
        }

        $nis = $request->session()->get('siswa_nis');

        $histori = DB::table('input_aspirasis')
            ->join('aspirasis', 'input_aspirasis.id_pelaporan', '=', 'aspirasis.id_aspirasi')
            ->join('kategoris', 'input_aspirasis.id_kategori', '=', 'kategoris.id_kategori')
            ->where('input_aspirasis.nis', $nis)
            ->get();

        return view('siswa.dashboard', compact('histori'));
    }

    // Proses keluar dari dasbor siswa
    public function logout(Request $request)
    {
        $request->session()->forget(['siswa_nis', 'siswa_kelas']);
        return redirect()->route('siswa.login');
    }
}