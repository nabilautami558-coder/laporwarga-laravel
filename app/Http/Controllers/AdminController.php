<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Dashboard utama admin
    public function index()
    {
        $totalPengaduan = Pengaduan::count();

        $menunggu = Pengaduan::where('status', 'Menunggu')->count();
        $diproses = Pengaduan::where('status', 'Diproses')->count();
        $selesai = Pengaduan::where('status', 'Selesai')->count();

        return view('admin.dashboard', compact(
            'totalPengaduan',
            'menunggu',
            'diproses',
            'selesai'
        ));
    }

    // Halaman khusus daftar pengaduan
    public function pengaduan()
    {
        $pengaduans = Pengaduan::with('user')
            ->latest()
            ->get();

        return view('admin.pengaduan', compact('pengaduans'));
    }

    // Memperbarui status pengaduan
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Menunggu,Diproses,Selesai',
        ]);

        $pengaduan = Pengaduan::findOrFail($id);

        $pengaduan->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.pengaduan')
            ->with('success', 'Status pengaduan berhasil diperbarui!');
    }
}
