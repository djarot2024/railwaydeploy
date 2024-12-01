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
        
        <div class="mb-3">
            <label for="Nama" class="form-label">Nama pelanggan</label>
            <input type="text" class="form-control" id="nama" name="nama" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="Alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="No Telepon" class="form-label">No Telepon</label>
            <input type="text" class="form-control" id="no_telepon" name="no_telepon" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="jenis Kelamin" class="form-label">Jenis Kelamin</label>
            <input type="text" class="form-control" id="kelamin" name="kelamin" aria-describedby="emailHelp">
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
        <!-- <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" aria-describedby="emailHelp">
        </div> -->
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

<!-- <div class="container">
    <h2>Tambah Data Cucian</h2>
    <form action="{{ route('cucianku.submit') }}" method="POST">
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

      
        <div class="form-group">
            <label for="nama">Nama Pelanggan</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Pelanggan">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat Pelanggan">
        </div>
        <div class="form-group">
            <label for="no_telepon">Nomor Telepon</label>
            <input type="text" name="no_telepon" id="no_telepon" class="form-control" placeholder="Nomor Telepon">
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="kelamin" id="kelamin" class="form-control">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="barang">Barang</label>
            <input type="text" name="barang" id="barang" class="form-control" placeholder="Jenis Barang">
        </div>
        <div class="form-group">
            <label for="jumlah_kilo">Jumlah Kilo (Kg)</label>
            <input type="number" name="jumlah_kilo" id="jumlah_kilo" class="form-control" placeholder="Jumlah Kilo">
        </div>
        <div class="form-group">
            <label for="kategory">Kategori</label>
            <select name="kategory" id="kategory" class="form-control">
                <option value="super express">Super Express</option>
                <option value="express">Express</option>
                <option value="semi express">Semi Express</option>
                <option value="reguler">Reguler</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="jenis cucian" class="form-label">Jenis cucian</label>
            <select class="form-control" name="jenis_cucian" id="jenis_cucian" required>
                <option value="">--pilih--</option>
                <option value="cuci komplit">cuci komplit</option>
                <option value="cuci setrika">cuci setrika</option>
                <option value="cuci lipat">cuci lipat</option>
            </select>
        </div>
        <div class="form-group">
            <label for="pelayanan">Pelayanan</label>
            <input type="text" name="pelayanan" id="pelayanan" class="form-control" placeholder="Jenis Pelayanan">
        </div>
        <div class="form-group">
            <label for="harga">Harga (Rp)</label>
            <input type="number" name="harga" id="harga" class="form-control" placeholder="Harga">
        </div>
        <div class="form-group">
            <label for="tanggal_masuk">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control">
        </div>
        <div class="form-group">
            <label for="tanggal_keluar">Tanggal Keluar (Opsional)</label>
            <input type="date" name="tanggal_keluar" id="tanggal_keluar" class="form-control">
        </div>
        <div class="form-group">
            <label for="status_pembayaran">Status Pembayaran</label>
            <select name="status_pembayaran" id="status_pembayaran" class="form-control">
                <option value="lunas">Lunas</option>
                <option value="belum lunas">Belum Lunas</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status Progres</label>
            <select name="status" id="status" class="form-control">
                <option value="sedang dicuci">Sedang Dicuci</option>
                <option value="selesai dicuci">Selesai Dicuci</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Tambah Data</button>
    </form>
</div> -->

</div>

@endsection