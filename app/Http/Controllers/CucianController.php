<?php

namespace App\Http\Controllers;

use App\Models\Cucian;
use App\Models\Pelanggan;
use App\Models\Pemasukan;
use Illuminate\Http\Request;

class CucianController extends Controller
{
    function tampil()  {
        $cucian=Cucian::with('pelanggan')->get();
        return view('cucianku.tampil', compact('cucian'));
    }

   
    function tambah()
    {
        // Mengambil semua data pelanggan untuk dropdown
        $pelanggan = Pelanggan::all();
        return view('cucianku.tambah', compact('pelanggan'));
    }
 
    // Menyimpan data cucian dan pelanggan
    function submit(Request $request)
    {
        // Cek apakah pelanggan baru atau sudah ada berdasarkan pelanggan_id
        if (!$request->pelanggan_id) {
            // Buat pelanggan baru jika pelanggan_id tidak ada
            $pelanggan = new Pelanggan();
            $pelanggan->nama = $request->nama;
            $pelanggan->alamat = $request->alamat;
            $pelanggan->no_telepon = $request->no_telepon;
            $pelanggan->kelamin = $request->kelamin;

            // Periksa apakah save berhasil
            if ($pelanggan->save()) {
                // Set pelanggan_id dari pelanggan yang baru dibuat
                $pelanggan_id = $pelanggan->id;
            } else {
                // Jika save gagal, lakukan penanganan
                return back()->with('error', 'Gagal menyimpan data pelanggan.');
            }
        } else {
            // Gunakan pelanggan_id yang ada
            $pelanggan_id = $request->pelanggan_id;

            // Load data pelanggan lama
            $pelanggan = Pelanggan::find($pelanggan_id);
            if (!$pelanggan) {
                return back()->with('error', 'Data pelanggan tidak ditemukan.');
            }
        }

        // Harga dasar dan kategori
        $hargaPerkilo = 7000;

        $kategoriHarga = [
            'super express' => 20000,
            'express' => 15000,
            'semi express' => 10000,
            'reguler' => 5000,
        ];
        $layananHarga = [
            'Antar' => 5000,
            'Ambil sendiri' => 7000,
        ];
        $jenis_cucianHarga = [
            'cuci_komplit' => 7000,
            'cuci_setrika' => 6000,
            'cuci_lipat' => 5000,
        ];

        $hargaKategori = $kategoriHarga[$request->kategory] ?? 0; // Pastikan key ada
        $hargaLayanan = $layananHarga[$request->pelayanan] ?? 0;
        $hargaJenis_cucian = $jenis_cucianHarga[$request->jenis_cucian] ?? 0;

        // Total harga
        $totalHarga = ($hargaPerkilo * $request->jumlah_kilo) + $hargaKategori + $hargaLayanan + $hargaJenis_cucian;

        // Simpan cucian menggunakan new Cucian
        $cucian = new Cucian();
        $cucian->nama_id = $pelanggan_id;
        $cucian->barang = $request->barang;
        $cucian->jumlah_kilo = $request->jumlah_kilo;
        $cucian->kategory = $request->kategory;
        $cucian->jenis_cucian = $request->jenis_cucian;
        $cucian->pelayanan = $request->pelayanan;
        $cucian->harga = $totalHarga;
        $cucian->tanggal_masuk = $request->tanggal_masuk;
        $cucian->tanggal_keluar = $request->tanggal_keluar;
        $cucian->status_pembayaran = $request->status_pembayaran;
        $cucian->status = 'sedang dicuci'; // Status default
        $cucian->nota = 'LDRY-' . strtoupper(uniqid());

        try {
            $cucian->save();

            // Tambahkan data ke tabel pemasukan
            $pemasukan = new Pemasukan();
            $pemasukan->pemasukan = $totalHarga;
            $pemasukan->deskripsi = 'Pemasukan dari cucian pelanggan ' . $pelanggan->nama;
            $pemasukan->tanggal_pemasukan = $request->tanggal_masuk ?? now();
            $pemasukan->save();

            return redirect()->route('cucianku.tampil')->with('success', 'Data cucian berhasil dibuat!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat membuat data! ' . $e->getMessage())
                ->withInput(); // Mengembalikan input ke form
        }
    }

 
    function tambahlama()
    {
        // Mengambil semua data pelanggan untuk dropdown
        $pelanggan = Pelanggan::all();
        return view('cucianku.tambahlama', compact('pelanggan'));
    }


    function edit($id){
        $cucian = Cucian::with('pelanggan')->findOrFail($id);
        return view('cucianku.edit', compact('cucian'));
    }

    function update(Request $request, $id){
        $cucian = Cucian::find($id); 

        if ($request->has('nama')) {
            $pelanggan = Pelanggan::where('nama', $request->nama)->first();
            
            if ($pelanggan) {
                $cucian->nama_id = $pelanggan->id; // Simpan ID pelanggan
            } else {
                // Opsi: Buat pelanggan baru jika nama tidak ditemukan
                $pelangganBaru = Pelanggan::create(['nama' => $request->nama]);
                $cucian->nama_id = $pelangganBaru->id;
            }
        }

        $cucian->barang = $request->barang;
        $cucian->jumlah_kilo = $request->jumlah_kilo;
        $cucian->kategory = $request->kategory;
        $cucian->jenis_cucian = $request->jenis_cucian;
        $cucian->pelayanan = $request->pelayanan;
        $cucian->harga = $request->harga;
        $cucian->tanggal_masuk = $request->tanggal_masuk;
        $cucian->tanggal_keluar= $request->tanggal_keluar;
        $cucian->status_pembayaran= $request->status_pembayaran;
        $cucian->status = 'sedang dicuci';
        $cucian->nota = 'LDRY-' . strtoupper(uniqid());
        
        try {
            $cucian->update();
    
            return redirect()->route('cucianku.tampil')->with('success', 'Data cucian berhasil diubah!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat mengubah data! ' . $e->getMessage())
                ->withInput(); // Mengembalikan input ke form
        }
    }

    public function ubahstatus(Request $request, $id)
    {
        // Validasi input status
        $request->validate([
            'status' => 'required|in:sedang dicuci,sudah selesai',
        ]);

        // Cari data cucian berdasarkan ID
        $cucian = Cucian::findOrFail($id);

        // Update status cucian
        $cucian->status = $request->status;

        try {
            $cucian->save();
            return redirect()->route('cucianku.tampil')->with('success', 'Status cucian berhasil diubah!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengubah status cucian: ' . $e->getMessage());
        }
    }

    function delete($id) {
        

        try {
            $cucian = Cucian::find($id)->delete();
            return redirect()->route('cucianku.tampil')->with('success', 'Data cucian berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menghapus data! ' . $e->getMessage())
                ->withInput(); // Mengembalikan input ke form
        }
    }

    //data pelanggan
    function tampilpelangga()  {
        $pelanggan=Pelanggan::get();
        return view('pelangganku.tampil', compact('pelanggan'));
    }

    public function tampilpelanggan(Request $request)
    {
        $query = Pelanggan::query();

        // Menyaring data berdasarkan input pencarian (jika ada)
        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        // Ambil semua data pelanggan yang sudah difilter
        $pelanggan = $query->get();

        return view('pelangganku.tampil', compact('pelanggan'));
    }
}
