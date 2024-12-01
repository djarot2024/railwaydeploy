@extends('layout')

@section('konten')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Pengeluaran</h1>
    <div class="card shadow mb-4 mt-3">
    <div class="card-header py-3 d-flex align-items-center">
    <form method="GET" action="{{ route('pengeluaran.tampil') }}" class="d-flex flex-grow-1">
        <div class="row w-100">
            <div class="col-md-2">
                <select name="month" class="form-control" onchange="this.form.submit()">
                    @for($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ $i == $month ? 'selected' : '' }}>
                            {{ \Carbon\Carbon::create()->month($i)->format('F') }}
                        </option>
                    @endfor
                </select>
            </div>
            <div class="col-md-2">
                <select name="year" class="form-control" onchange="this.form.submit()">
                    @for($i = Carbon\Carbon::now()->year; $i >= 2000; $i--)
                        <option value="{{ $i }}" {{ $i == $year ? 'selected' : '' }}>
                            {{ $i }}
                        </option>
                    @endfor
                </select>
            </div>
        </div>
    </form>
    <a href="{{ route('pengeluaran.tambah') }}" class="btn btn-primary ms-auto">Tambah Pengeluaran</a>
    </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Deskripsi</th>
                        <th>Pengeluaran</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengeluaran as $no => $data)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $data->deskripsi }}</td>
                        <td>Rp {{ number_format($data->pengeluaran, 2, ',', '.') }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->tanggal_pengeluaran)->format('d M Y') }}</td>
                        <td class="d-flex justify-content-center">
                            <div class="px-1">
                                <a href="{{ route('pengeluaran.edit', $data->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-pen fa-1x"></i>
                                </a>
                            </div>
                            <div>
                                <form id="delete-form-{{ $data->id }}" action="{{ route('pengeluaran.delete', $data->id) }}" method="post">
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

    <div class="card shadow mb-4">
        <div class="card-body">
            <h4>Total Pengeluaran Bulan Ini: <strong>Rp {{ number_format($totalPengeluaranPerBulan, 2, ',', '.') }}</strong></h4>
            <h4>Total Keseluruhan Pengeluaran: <strong>Rp {{ number_format($totalPengeluaranKeseluruhan, 2, ',', '.') }}</strong></h4>
        </div>
    </div>
</div>



<script>
    function confirmDelete(id) {
        // Menampilkan konfirmasi dengan SweetAlert
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data pengeluaran ini akan dihapus!",
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