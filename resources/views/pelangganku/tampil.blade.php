@extends('layout')
                   
@section('konten')
 
 
 <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Pelanggan</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="GET" action="{{ route('pelangganku.tampil') }}">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="search" value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Kelamin</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelanggan as $no=>$data)
                    <tr>
                        <td class="text-center">{{ $no+1 }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->alamat  }}</td>
                        <td>{{ $data->no_telepon  }}</td>
                        <td>{{ $data->kelamin  }}</td>
                        <td class="d-flex justify-content-center">
                            <div class="px-1">
                                <a href="{{ route('pelangganku.edit', $data->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-pen fa-1x"></i>
                                </a>
                            </div>
                            <div>
                                <form id="delete-form-{{ $data->id }}" action="{{ route('pelangganku.delete', $data->id) }}" method="post">
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
            text: "Data pelanggan ini akan dihapus!",
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