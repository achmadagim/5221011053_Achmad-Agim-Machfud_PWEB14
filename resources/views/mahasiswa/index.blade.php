@extends('layout.template')

@section('konten')
<!-- START DATA -->
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <!-- HEADER -->
    <header class="bg-primary text-white text-center py-5 mb-4 rounded-5" style="padding-left: 40px; padding-right: 40px;"> 
        <div class="container">
            <!-- Judul dan deskripsi -->
            <div>
                <h1 class="display-5 fw-bold">Data Mahasiswa Universitas Kayangan</h1>
                <p class="lead" style="margin: 10px; font-size: 16px">Input data mahasiswa untuk membantu meringankan tugas dari admin universitas.
                    Anda bisa menambahkan data, menghapus data, mengubah data, dan melihat data sesuai yang anda inginkan.
                </p>
            </div>
        </div>
    </header>
    
    <!-- Tambahkan logo di sini -->
    <div style="text-align: center;"> 
        <img src="{{ asset('images/Logo.png') }}" alt="Logo" style="max-width: 200px; display: inline-block; vertical-align: middle; margin-right: 20px;">
    </div>
    
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
      <form class="d-flex" action="{{ url('mahasiswa') }}" method="get">
          <input class="form-control me-2" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
          <button class="btn btn-outline-light bg-primary text-white" type="submit">Cari</button>
      </form>
    </div>
    
    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
      <a href='{{url('mahasiswa/create')}}' class="btn btn-primary">+ Tambah Data</a>
    </div>

    <!-- TAMPILKAN ALERT JIKA ADA PESAN -->
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">NPM</th>
                <th class="col-md-4">Nama Mahasiswa</th>
                <th class="col-md-2">Program Studi</th>
                <th class="col-md-2">Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = $data->firstItem() ?>
            @foreach ($data as $item)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $item->NPM }}</td>
                <td>{{ $item->Nama }}</td>
                <td>{{ $item->Jurusan }}</td>
                <td>
                    <a href='{{ url('mahasiswa/'.$item->NPM.'/edit') }}' class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil-square"></i> Ubah
                    </a>
                    <form onsubmit="return confirm('Yakin ingin menghapus data ini?')" class='d-inline' action="{{ url('mahasiswa/'.$item->NPM) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
    {{ $data->withQueryString()->links() }}
</div>
<!-- AKHIR DATA -->
@endsection
