<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cucian;
use Illuminate\Http\Request;

class LaundryController extends Controller
{
    public function index(){
        $cucian = Cucian::oldest()->get();


        if ($cucian->isEmpty()){
            return response()->json([
                "response"=>[
                    "status" => 204,
                    "message" => "Tidak ada ada data cucian yang ditemukan"
                ],
                    "data" =>[]
            ],204);

    }

            return response()->json([
                "response"=>[
                    "status" => 200,
                    "message" => "List Data Cucian"
                ],
                    "data" =>$cucian
            ], 200);
    }

     public function show($nota)
    {
        // Load cucian dengan relasi pelanggan
        $cucian = Cucian::with('pelanggan')->where("nota", $nota)->first();

        if ($cucian) {
            return response()->json([
                "response" => [
                    "status" => 200,
                    "message" => "Detail Data Cucian"
                ],
                "data" => [
                    "nota" => $cucian->nota,
                    "nama" => $cucian->pelanggan->nama ?? 'Nama tidak ditemukan', // Ambil nama dari tabel pelanggan
                    "barang" => $cucian->barang,
                    "jumlah_kilo" => $cucian->jumlah_kilo,
                    "kategory" => $cucian->kategory,
                    "jenis" => $cucian->jenis_cucian,
                    "pelayanan" => $cucian->pelayanan,
                    "harga" => $cucian->harga,
                    "status" => $cucian->status,
                    "tanggal_masuk" => $cucian->tanggal_masuk,
                    "tanggal_keluar" => $cucian->tanggal_keluar,
                    "status_pembayaran" => $cucian->status_pembayaran,
                ]
            ], 200);
        } else {
            return response()->json([
                "response" => [
                    "status" => 404,
                    "message" => "Cucian tidak ditemukan"
                ],
                "data" => null
            ], 404);
        }
    }

}