<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function tampil(Request $request)
    {
        // Ambil bulan dan tahun yang dipilih, default ke bulan dan tahun saat ini
        $month = $request->input('month', Carbon::now()->month);
        $year = $request->input('year', Carbon::now()->year);

        // Ambil pengeluaran berdasarkan bulan dan tahun
        $pengeluaran = Pengeluaran::whereMonth('tanggal_pengeluaran', $month)
                                ->whereYear('tanggal_pengeluaran', $year)
                                ->get();

        // Hitung total pengeluaran di bulan yang dipilih
        $totalPengeluaranPerBulan = Pengeluaran::whereMonth('tanggal_pengeluaran', $month)
                                            ->whereYear('tanggal_pengeluaran', $year)
                                            ->sum('pengeluaran');

        // Hitung total keseluruhan pengeluaran
        $totalPengeluaranKeseluruhan = Pengeluaran::sum('pengeluaran');

        // Kirim data ke view
        return view('pengeluaran.tampil', compact(
            'pengeluaran',
            'totalPengeluaranPerBulan',
            'totalPengeluaranKeseluruhan',
            'month',
            'year'
        ));
    }

    public function tambah(Request $request)
    { 
        return view('pengeluaran.tambah');
    }

    public function submit(Request $request)
    { 
        $pengeluaran = new Pengeluaran();
        $pengeluaran->pengeluaran = $request->input('pengeluaran');
        $pengeluaran->deskripsi = $request->input('deskripsi');
        $pengeluaran->tanggal_pengeluaran = $request->input('tanggal_pengeluaran');

        try {
            $pengeluaran->save();
    
            return redirect()->route('pengeluaran.tampil')->with('success', 'Data pengeluaran berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menambah data! ' . $e->getMessage())
                ->withInput(); // Mengembalikan input ke form
        }
    }

    public function edit($id)
    { 
        $pengeluaran = Pengeluaran::find($id); 
        return view('pengeluaran.edit',compact('pengeluaran'));
    }

    public function update(Request $request, $id){
        $pengeluaran = Pengeluaran::find($id); 

        $pengeluaran->pengeluaran = $request->pengeluaran;
        $pengeluaran->deskripsi = $request->deskripsi;
        $pengeluaran->tanggal_pengeluaran = $request->tanggal_pengeluaran;
        
        try {
            $pengeluaran->update();
    
            return redirect()->route('pengeluaran.tampil')->with('success', 'Data pengeluaran berhasil diubah!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat mengubah data! ' . $e->getMessage())
                ->withInput(); // Mengembalikan input ke form
        }
    }

    public function delete($id) {
        

        try {
            $pengeluaran = Pengeluaran::find($id)->delete();
            return redirect()->route('pengeluaran.tampil')->with('success', 'Data pengeluaran berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menghapus data! ' . $e->getMessage())
                ->withInput(); // Mengembalikan input ke form
        }
    }


}
