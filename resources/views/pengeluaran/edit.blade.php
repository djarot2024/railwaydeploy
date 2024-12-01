@extends('layout')
                   
@section('konten')
 
  <div class="container-fluid">


<h1 class="h3 mb-2 text-gray-800">Data Pengeluaran</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Pengeluaran</h6>
    </div>                          
    <div class="card-body">
    <form action="{{ route('pengeluaran.update', $pengeluaran->id) }}" method="post">
        @csrf
        
        <div class="mb-3">
            <label for="Nama" class="form-label">Jumlah Pengeluaran</label>
            <input type="text" class="form-control" id="nama" value="{{ $pengeluaran->pengeluaran }}" name="pengeluaran" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="Alamat" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" id="alamat" value="{{ $pengeluaran->deskripsi }}" name="deskripsi" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="No Telepon" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="no_telepon" value="{{ old('tanggal_pengeluaran', $pengeluaran->tanggal_pengeluaran ? $pengeluaran->tanggal_pengeluaran->format('Y-m-d') : '') }}" name="tanggal_pengeluaran" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</div>
</div>

@endsection