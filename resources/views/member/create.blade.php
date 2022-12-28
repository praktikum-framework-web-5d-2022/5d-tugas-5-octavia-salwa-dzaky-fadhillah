@extends('master')
@section('title','Perpustakaan')

@section('content')
    <style>
        .bg-blue {
            background-color: blue;
            color: white;
        }
        .bt-blue{
            background-color: blue;
            color: white;
        }
    </style>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <h2>Tambah Data Pelajar</h2>
                <p>Silahkan masukkan data dengan benar dan lengkap!</p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <form action="{{route('member.store')}}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="npm" class="form-label">NPM</label>
                        <input type="text" name="npm" id="npm" placeholder="Masukkan npm" class="form-control" value="{{old('npm')}}">
                        @error('npm')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" class="form-control" value="{{old('nama')}}">
                        @error('nama')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="Laki-laki" {{old('jenis_kelamin') == "Laki-laki" ? "selected" : ""}}>Laki-laki</option>
                            <option value="Perempuan" {{old('jenis_kelamin') == "Perempuan" ? "selected" : ""}}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat">{{old('alamat')}}</textarea>
                        @error('alamat')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="judul_buku" class="form-label">Judul Buku</label>
                        <input type="text" name="judul_buku" id="judul_buku" placeholder="Masukkan judul buku yang dipinjam" class="form-control" value="{{old('judul_buku')}}">
                        @error('judul_buku')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nama_pengarang" class="form-label">Nama Pengarang</label>
                        <input type="text" name="nama_pengarang" id="nama_pengarang" placeholder="Masukkan nama pengarang buku yang dipinjam" class="form-control" value="{{old('nama_pengarang')}}">
                        @error('nama_pengarang')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="jumlah_halaman" class="form-label">Jumlah Halaman</label>
                        <input type="text" name="jumlah_halaman" id="jumlah_halaman" placeholder="Masukkan jumlah halaman buku yang dipinjam" class="form-control" value="{{old('jumlah_halaman')}}">
                        @error('jumlah_halaman')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn bt-blue">Tambah</button>
                    <p></p>
                </form>
            </div>
        </div>
    </div>
@endsection
