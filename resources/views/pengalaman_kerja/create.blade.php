@extends('adminlte::page')
@section('title', 'Tambah Pengalaman Kerja')
@section('content_header')
    <h1 class="m-0 text-dart">Tambah Pengalaman Kerja</h1>
@stop
@section('content')
    <form action="{{ route('pengalaman_kerja.store') }}" method="post">
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputNama">Nama Perusahaan</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                        id="exampleInputNama" placeholder="Nama Perusahaan" name="nama"
                        value="{{ old('nama') }}">
                        @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputJabatan">Jabatan</label>
                        <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                        id="exampleInputJabatan" placeholder="Masukkan Jabatan" name="jabatan"
                        value="{{ old('jabatan') }}">
                        @error('jabatan') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTahunMasuk">Tahun Masuk</label>
                        <input type="text" class="form-control @error('tahun_masuk') is-invalid @enderror"
                        id="exampleInputTahunMasuk" placeholder="Masukkan Tahun Masuk" name="tahun_masuk"
                        value="{{ old('tahun_masuk') }}">
                        @error('tahun_masuk') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTahunKeluar">Tahun Keluar</label>
                        <input type="text" class="form-control @error('tahun_keluar') is-invalid @enderror"
                        id="exampleInputTahunKeluar" placeholder="Masukkan Tahun Keluar" name="tahun_keluar"
                        value="{{ old('tahun_keluar') }}">
                        @error('tahun_keluar') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('pengalaman_kerja.index') }}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    </form>
@stop
    