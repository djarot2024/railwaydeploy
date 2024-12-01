@extends('layout')
                   
@section('konten')
 
 
 <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Harga Perkilo</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <!-- <h6 class="m-0 font-weight-bold text-primary">Tambah Cucian</h6> -->
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2</td>
                        <td>2 kg</td>
                        <td>10000</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>3 kg</td>
                        <td>15000</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>4 kg</td>
                        <td>20000</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>5 kg</td>
                        <td>25000</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

    <h1 class="h3 mb-2 text-gray-800">Harga Kategory</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <!-- <h6 class="m-0 font-weight-bold text-primary">Tambah Cucian</h6> -->
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>kategory</th>
                        <th>Harga</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Super express</td>
                        <td>7000</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Semi express</td>
                        <td>7000</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Express</td>
                        <td>7000</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Reguler</td>
                        <td>7000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<h1 class="h3 mb-2 text-gray-800">Harga Jenis Cucian</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <!-- <h6 class="m-0 font-weight-bold text-primary">Tambah Cucian</h6> -->
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis cucian</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Cuci komplit</td>
                        <td>5000</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Cuci Lipat</td>
                        <td>5000</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Cuci Setrika</td>
                        <td>5000</td>
                    </tr>
                 </tbody>
            </table>
        </div>
    </div>
</div>
<h1 class="h3 mb-2 text-gray-800">Harga Pelayanan</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <!-- <h6 class="m-0 font-weight-bold text-primary">Tambah Cucian</h6> -->
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pelayanan</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Antar</td>
                        <td>5000</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Ambil Sendiri</td>
                        <td>5000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection