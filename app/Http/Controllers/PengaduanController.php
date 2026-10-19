<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    // Menampilkan formulir pengaduan
    public function create()
    {
        return view('pengaduan.create');
    }

    // Menyimpan pengaduan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'lokasi' => 'required|string|max:255',
            'waktu_kejadian' => 'nullable|date',
            'isi_laporan' => 'required|string|min:10',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['status'] = 'Menunggu';

        Pengaduan::create($validated);

        return redirect()->route('dashboard')
            ->with('success', 'Pengaduan berhasil dikirim!');
    }

    // Menampilkan daftar pengaduan milik warga
    public function index()
    {
        $pengaduans = Pengaduan::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('pengaduan.index', compact('pengaduans'));
    }

    // Menampilkan detail satu pengaduan milik warga
    public function show($id)
    {
        $pengaduan = Pengaduan::where('user_id', Auth::id())
            ->findOrFail($id);

        return view('pengaduan.show', compact('pengaduan'));
    }
}

