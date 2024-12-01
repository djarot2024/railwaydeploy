@extends('layout')
                   
@section('konten')
 
 
 <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Edit Cucian</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Cucian</h6>
    </div>                          
    <div class="card-body">
    <form action="{{ route('cucianku.update', $cucian->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="Nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $cucian->pelanggan ? $cucian->pelanggan->nama : '' }}" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Barang</label>
            <input type="text" class="form-control" id="barang" name="barang" value="{{ $cucian->barang }}" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Jumlah kilo</label>
            <input type="number" class="form-control" id="jumlah_kilo" name="jumlah_kilo" value="{{ $cucian->jumlah_kilo }}" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="kategory" class="form-label">Katagory:</label>
            <select class="form-control" name="kategory" id="kategory" required>
                <option value="">--pilih--</option>
                <option @if($cucian['kategory']=='super express') selected @endif value="super express">super express</option>
                <option @if($cucian['kategory']=='express') selected @endif value="express">express</option>
                <option @if($cucian['kategory']=='semi express') selected @endif value="semi express">semi express</option>
                <option @if($cucian['kategory']=='reguler') selected @endif value="reguler">reguler</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="jenis cucian" class="form-label">Jenis cucian</label>
            <select class="form-control" name="jenis_cucian" id="katagory" required>
                <option value="">--pilih--</option>
                <option @if($cucian['jenis_cucian']=='cuci komplit') selected @endif value="cuci komplit">cuci komplit</option>
                <option @if($cucian['jenis_cucian']=='cuci setrika') selected @endif value="cuci setrika">cuci setrika</option>
                <option @if($cucian['jenis_cucian']=='cuci lipat') selected @endif value="cuci lipat">cuci lipat</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="pelayanan" class="form-label">Pelayanan</label>
            <select class="form-control" name="pelayanan" id="katagory" required>
                <option value="">--pilih--</option>
                <option @if($cucian['pelayanan']=='Antar') selected @endif value="Antar">Antar</option>
                <option @if($cucian['pelayanan']=='Ambil sendiri') selected @endif value="Ambil sendiri">Ambil sendiri</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ $cucian->harga }}" aria-describedby="emailHelp">
        </div>
        <div class="d-flex flex-row">
            <div class="mb-3 mr-3 col-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal masuk</label>
                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="{{ $cucian->tanggal_masuk }}" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 col-3">
                <label for="exampleInputPassword1" class="form-label">Tanggal keluar</label>
                <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" value="{{ $cucian->tanggal_keluar }}">
            </div>
        </div>
        <div class="mb-3">
            <label for="status_pembayaran" class="form-label">Status_pembayaran</label>
            <select class="form-control" name="status_pembayaran" id="katagory" required>
                <option value="">--pilih--</option>
                <option @if($cucian['status_pembayaran']=='Lunas') selected @endif value="Lunas">Lunas</option>
                <option @if($cucian['status_pembayaran']=='Belum_lunas') selected @endif value="Belum_lunas">Belum Lunas</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection