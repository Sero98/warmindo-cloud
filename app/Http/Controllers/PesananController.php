<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class PesananController extends Controller
{
    public function simpan(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'nama' => 'required',
            'pesanan' => 'required'
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
