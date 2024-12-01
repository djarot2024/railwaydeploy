@extends('layout')
                   
@section('konten')
 
  <div class="container-fluid">


<h1 class="h3 mb-2 text-gray-800">Data Cucian</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Cucian</h6>
    </div>                          
    <div class="card-body">
    <form action="{{ route('cucianku.submit') }}" method="post">
        @csrf
        
        <div class="form-group">
            <label for="pelanggan_id">Pilih Pelanggan (Opsional)</label>
            <select name="pelanggan_id" id="pelanggan_id" class="form-control">
                <option value="">-- Pilih Pelanggan --</option>
                @foreach($pelanggan as $data)
                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Barang</label>
            <input type="text" class="form-control" id="barang" name="barang" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Jumlah kilo</label>
            <input type="number" class="form-control" id="jumlah_kilo" name="jumlah_kilo" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="kategory" class="form-label">Katagory:</label>
            <select class="form-control" name="kategory" id="kategory" required>
                <option value="">--pilih--</option>
                <option value="super express">super express</option>
                <option value="express">express</option>
                <option value="semi express">semi express</option>
                <option value="reguler">reguler</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="jenis cucian" class="form-label">Jenis cucian</label>
            <select class="form-control" name="jenis_cucian" id="katagory" required>
                <option value="">--pilih--</option>
                <option value="cuci komplit">cuci komplit</option>
                <option value="cuci setrika">cuci setrika</option>
                <option value="cuci lipat">cuci lipat</option>
                <option value="cuci lipat">lipat pakaian</option>
                <option value="cuci lipat">setrika pakaian</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="pelayanan" class="form-label">Pelayanan</label>
            <select class="form-control" name="pelayanan" id="katagory" required>
                <option value="">--pilih--</option>
                <option value="Antar">Antar - Jemput</option>
                <option value="Ambil sendiri">Ambil sendiri</option>
            </select>
        </div>
        <div class="d-flex flex-row">
            <div class="mb-3 mr-3 col-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal masuk</label>
                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 col-3">
                <label for="exampleInputPassword1" class="form-label">Tanggal keluar</label>
                <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar">
            </div>
        </div>
        <div class="mb-3">
            <label for="status_pembayaran" class="form-label">Status pembayaran</label>
            <select class="form-control" name="status_pembayaran" id="status_pembayaran" required>
                <option value="">--pilih--</option>
                <option value="Lunas">Lunas</option>
                <option value="Belum_lunas">Belum Lunas</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</div>

</div>

@endsection