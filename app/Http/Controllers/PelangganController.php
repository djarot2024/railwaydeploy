<?php

namespace App\Http\Controllers;

use App\Models\Cucian;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    function edit($id){
        $pelanggan = Pelanggan::find($id);
        return view('pelangganku.edit', compact('pelanggan'));
    }
    function update(Request $request, $id){
        $pelanggan = Pelanggan::find($id); 
        $pelanggan->nama = $request->nama;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->no_telepon = $request->no_telepon;
        $pelanggan->kelamin = $request->kelamin;
        
        try {
            $pelanggan->update();
    
            return redirect()->route('pelangganku.tampil')->with('success', 'Data pelanggan berhasil diubah!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat mengubah data! ' . $e->getMessage())
                ->withInput(); // Mengembalikan input ke form
        }
    }
    function delete($id) {
        $pelanggan = Pelanggan::find($id);
        
        // Mengecek apakah pelanggan masih memiliki cucian yang belum selesai
        $cucian = Cucian::where('nama_id', $id)->exists();

        if ($cucian) {
            // Pelanggan masih memiliki cucian, kirim pesan error
            return redirect()->back()->with('error', 'Pelanggan sedang mencuci, tidak bisa dihapus.');
        }

        // Jika tidak ada cucian, lakukan penghapusan
        $pelanggan->delete();
        return redirect()->route('pelangganku.tampil')->with('success', 'Pelanggan berhasil dihapus.');
    }
}
