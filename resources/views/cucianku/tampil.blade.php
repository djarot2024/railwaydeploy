@extends('layout')
                   
@section('konten')
 
 
 <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Cucian</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('cucianku.tambah') }}" class="btn btn-primary">Pelanggan Baru</a>
        <a href="{{ route('cucianku.tambahlama') }}" class="btn btn-primary">Pelanggan Setia</a>
        <!-- <h6 class="m-0 font-weight-bold text-primary">Tambah Cucian</h6> -->
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-nowrap text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Barang</th>
                        <th>Jumlah kilo</th>
                        <th>Kategory</th>
                        <th>Jenis</th>
                        <th>Pelayanan</th>
                        <th>Harga</th>
                        <th>Tanggal masuk</th>
                        <th>Tanggal keluar</th>
                        <th>Status pembayaran</th>
                        <th style="padding: 12px 28px;" class="text-nowrap">Status Cucian</th>
                        <th>Nota</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cucian as $no=>$data)
                    <tr class="text-nowrap text-start">
                        <td>{{ $no+1 }}</td>
                        <td>{{ $data->pelanggan ? $data->pelanggan->nama : '-' }}</td>
                        <td>{{ $data->barang  }}</td>
                        <td class="text-center">{{ $data->jumlah_kilo  }}</td>
                        <td>{{ $data->kategory  }}</td>
                        <td>{{ $data->jenis_cucian  }}</td>
                        <td>{{ $data->pelayanan  }}</td>
                        <td>Rp {{ number_format($data->harga, 2, ',', '.') }}</td>                    
                        <td>{{ $data->tanggal_masuk  }}</td>
                        <td>{{ $data->tanggal_keluar  }}</td>
                        <td>{{ $data->status_pembayaran  }}</td>
                        <!-- <td>{{ $data->status  }}</td> -->
                        <td>
                            <!-- Dropdown untuk Ubah Status -->
                            <form action="{{ route('cucianku.ubahstatus', $data->id) }}" method="post">
                                @csrf
                                @method('patch')
                                <select name="status" class="form-control form-control-sm
                                {{ $data->status == 'sedang dicuci' ? 'bg-warning text-dark' : '' }} 
                                {{ $data->status == 'sudah selesai' ? 'bg-success text-white' : '' }}"
                               width="100%" style="padding: 5px 10px;"
                                onchange="this.form.submit()">
                                    <option value="sedang dicuci" {{ $data->status == 'sedang dicuci' ? 'selected' : '' }}>Sedang Dicuci</option>
                                    <option value="sudah selesai" {{ $data->status == 'sudah selesai' ? 'selected' : '' }}>Sudah Selesai</option>
                                </select>
                            </form>
                        </td>
                        <td>{{ $data->nota  }}</td>
                        <td class="d-flex">
                            <div class="px-1">
                                <a href="{{ route('cucianku.edit', $data->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-pen fa-1x"></i>
                                </a>
                            </div>
                            <div>
                                <form id="delete-form-{{ $data->id }}" action="{{ route('cucianku.delete', $data->id) }}" method="post">
                                    @csrf
                                </form>
                                <button type="button" onclick="confirmDelete('{{ $data->id}}')" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash fa-1x"></i>
                                </button>
                            </div>
                        </td> 
                    </tr>                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<script>
    function confirmDelete(id) {
        // Menampilkan konfirmasi dengan SweetAlert
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data cucian ini akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika diklik "Ya, hapus!", kirim form penghapusan
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>

@endsection