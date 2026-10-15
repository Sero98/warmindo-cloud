<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index(): View
    {
        $pesanans = Pesanan::query()->latest()->limit(10)->get();

        return view('welcome', compact('pesanans'));
    }

    public function simpan(Request $request): RedirectResponse
    {
        // Validasi data yang masuk
        $request->validate([
            'nama' => 'required',
            'pesanan' => 'required',
        ]);

        // Simpan ke database
        Pesanan::create([
            'nama' => $request->nama,
            'pesanan' => $request->pesanan,
            'keterangan' => $request->keterangan,
        ]);

        // Kembalikan ke halaman utama dengan pesan sukses
        return back()->with('sukses', 'Pesanan berhasil dikirim!');
    }
}
