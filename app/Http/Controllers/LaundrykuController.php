<?php

namespace App\Http\Controllers;

use App\Models\Cucian;
use App\Models\Pelanggan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Carbon\Carbon;
use Illuminate\Http\Request;


class LaundrykuController extends Controller
{
    // Di controller Anda
    public function tampilcucian()
    {
        $totalcucian = Cucian::count();
        $totalpelanggan = Pelanggan::count();
        $totalPemasukan = Pemasukan::sum('pemasukan');
        $totalPengeluaran = Pengeluaran::sum('pengeluaran');
        return view('laundryku.laundrykuu', compact('totalcucian', 'totalpelanggan','totalPemasukan','totalPengeluaran'));
    }

    public function harga()
    {
        return view('laundryku.harga');
    }

    public function pemasukan(Request $request)
    {
       // Ambil bulan dan tahun yang dipilih, jika tidak ada gunakan bulan dan tahun saat ini
       $month = $request->input('month', Carbon::now()->month);
       $year = $request->input('year', Carbon::now()->year);

       // Ambil pemasukan berdasarkan bulan dan tahun yang dipilih
       $pemasukan = Pemasukan::whereMonth('tanggal_pemasukan', $month)
                             ->whereYear('tanggal_pemasukan', $year)
                             ->get();

       // Hitung total pemasukan per bulan yang dipilih
       $totalPemasukanPerBulan = Pemasukan::whereMonth('tanggal_pemasukan', $month)
                                         ->whereYear('tanggal_pemasukan', $year)
                                         ->sum('pemasukan');

       // Hitung total pemasukan keseluruhan
       $totalPemasukanKeseluruhan = Pemasukan::sum('pemasukan');

       // Kirim data ke view
       return view('laundryku.pemasukan', compact('pemasukan', 'totalPemasukanPerBulan', 'totalPemasukanKeseluruhan', 'month', 'year'));
    }

    

}
