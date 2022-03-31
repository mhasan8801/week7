@extends('adminlte::page')
@section('title', 'List Pengalaman Kerja')
@section('content_header')
    <h1 class="m-0 text-dark">List Pengalaman Kerja</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('pengalaman_kerja.create') }}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Perusahaan</th>
                            <th>Jabatan</th>
                            <th>Tahun Masuk</th>
                            <th>Tahun Keluar</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pengalaman_kerja as $key => $pengalamankerja)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $pengalamankerja->nama }}</td>
                                <td>{{ $pengalamankerja->jabatan }}</td>
                                <td>{{ $pengalamankerja->tahun_masuk }}</td>
                                <td>{{ $pengalamankerja->tahun_keluar }}</td>
                                <td>
                                    <a href="{{ route('pengalaman_kerja.edit', $pengalamankerja) }}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{ route('pengalaman_kerja.destroy', $pengalamankerja) }}"
                                    onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda akan ingin menghapus data? ')) {
                $("delete-form").attr('action', $(el).attr('href'));
                $("delete-form").sumbit();
            }
        }
    </script>
@endpush