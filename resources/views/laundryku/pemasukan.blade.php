@extends('layout')

@section('konten')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pemasukan</h1>

    <!-- Data Pemasukan -->
    <div class="card shadow mb-4 mt-3">
        <div class="card-header py-3">
            <!-- Form Filter Bulan dan Tahun -->
            <form method="GET" action="{{ route('laundryku.pemasukan') }}">
                <div class="row">
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
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Deskripsi</th>
                            <th>Pemasukan</th>
                            <th>Tanggal Pemasukan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemasukan as $no => $data)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $data->deskripsi }}</td>
                            <td>Rp {{ number_format($data->pemasukan, 2, ',', '.') }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->tanggal_pemasukan)->format('d M Y') }}</td>
                        </tr>                    
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Total Pemasukan -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <h4>Total Pemasukan: <strong>Rp {{ number_format($totalPemasukanPerBulan, 2, ',', '.') }}</strong></h4>
            <h4>Total Pemasukan Keseluruhan: <strong>Rp {{ number_format($totalPemasukanKeseluruhan, 2, ',', '.') }}</strong></h4>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection