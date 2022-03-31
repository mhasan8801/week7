@extends('adminlte::page')
@section('title', 'List Pengalaman Kerja')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Pengalaman Kerja</h1>
@stop
@section('content')
    <form action="{{ route('pengalaman_kerja.update', $pengalamankerja) }}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputNama">Nama Perusahaan</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                            id="exampleInputNama" placeholder="Nama Perusahaan" name="nama"
                            value="{{ $pengalamankerja->nama ?? old('nama') }}">
                            @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputJabatan">Jabatan</label>
                            <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                            id="exampleInputJabatan" placeholder="Masukkan Jabatan" name="jabatan"
                            value="{{ $pengalamankerja->jabatan ?? old('jabatan') }}">
                            @error('jabatan') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputTahunMasuk">Tahun Masuk</label>
                            <input type="text" class="form-control @error('tahun_masuk') is-invalid @enderror"
                            id="exampleInputTahunMasuk" placeholder="Masukkan Tahun Masuk" name="tahun_masuk"
                            value="{{ $pengalamankerja->tahun_masuk ??old('tahun_masuk') }}">
                            @error('tahun_masuk') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputTahunKeluar">Tahun Keluar</label>
                            <input type="text" class="form-control @error('tahun_keluar') is-invalid @enderror"
                            id="exampleInputTahunKeluar" placeholder="Masukkan Tahun Keluar" name="tahun_keluar"
                            value="{{ $pengalamankerja->tahun_keluar ?? old('tahun_keluar') }}">
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