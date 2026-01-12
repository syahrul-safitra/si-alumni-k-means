@extends('Admin.Layouts.main')

@section('container')
    <!-- DataTables Berita -->
    <div class="card mb-4 shadow">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-success m-0">Data Infaq</h6>
        </div>

        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ url('infaq/create') }}" class="btn btn-success mb-3">
                Tambah Infaq
            </a>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Jenis Infak</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($infaqs as $infaq)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $infaq->nama }}</td>
                                <td>{{ date('d-m-Y', strtotime($infaq->tanggal)) }}</td>
                                <td>{{ $infaq->jenis_infak }}</td>
                                <td>{{ $infaq->jumlah }}</td>

                                <td>
                                    <div class="d-flex">
                                        <a href="{{ url("infaq/$infaq->id/edit") }}" class="btn btn-warning btn-sm mr-2">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ url("infaq/$infaq->id") }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus berita ini?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
