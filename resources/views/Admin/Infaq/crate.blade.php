@extends('Admin.Layouts.main')

@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Form Data Infaq</h5>
                </div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif


                    <form action="{{ url('/infaq') }}" method="POST">
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-12 mb-2">
                                <label class="form-label">Nama Pemberi Infaq</label>
                                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}"
                                    placeholder="Masukkan nama lengkap" required>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="form-label">Tanggal Infaq</label>
                                <input type="date" name="tanggal" class="form-control"
                                    value="{{ old('tanggal', date('Y-m-d')) }}" required>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="form-label">Jenis Infaq</label>
                                <input type="text" name="jenis_infak" class="form-control"
                                    value="{{ old('jenis_infak') }}" placeholder="Masukkan Jenis Infaq" required>
                            </div>

                            <div class="col-md-4 mb-2">
                                <label class="form-label">Jumlah Infaq (Rp)</label>
                                <input type="text" id="jumlah_infaq_display" class="form-control"
                                    placeholder="Contoh: 50.000" required>
                                <input type="hidden" name="jumlah" id="jumlah_infaq_real"
                                    value="{{ old('jumlah_infaq') }}">
                            </div>

                        </div>

                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-success">
                                Simpan Data Infaq
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const displayInput = document.getElementById('jumlah_infaq_display');
        const realInput = document.getElementById('jumlah_infaq_real');

        displayInput.addEventListener('input', function(e) {
            // Hapus semua karakter kecuali angka
            let value = this.value.replace(/\D/g, '');

            // Simpan angka murni ke hidden input
            realInput.value = value;

            // Format angka dengan titik sebagai pemisah ribuan
            if (value) {
                this.value = new Intl.NumberFormat('id-ID').format(value);
            } else {
                this.value = '';
            }
        });
    </script>
@endsection
