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
    <form action="{{ route('pelangganku.update', $pelanggan->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="Nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $pelanggan->nama }}" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Almat</label>
            <input type="text" class="form-control" id="barang" name="alamat" value="{{ $pelanggan->alamat }}" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">No Telepon</label>
            <input type="number" class="form-control" id="jumlah_kilo" name="no_telepon" value="{{ $pelanggan->no_telepon }}" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Kelamin</label>
            <input type="text" class="form-control" id="jumlah_kilo" name="kelamin" value="{{ $pelanggan->kelamin }}" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection