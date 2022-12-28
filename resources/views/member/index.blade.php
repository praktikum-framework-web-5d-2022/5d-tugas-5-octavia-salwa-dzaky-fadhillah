@extends('master')
@section('title','Perpustakaan')
@section('menu','active')

@section('content')
    <style>
        .bg-blue {
            background-color: blue;
            color: white;
        }
        .text-blue {
            color: blue;
            font-weight: bold
        }
    </style>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h2>Data Pelajar</h2>
                    <a href="{{route('member.create')}}" class="btn bg-blue">Tambah</a>
                </div>
                <p>Dibawah ini merupakan data pelajar <span class="text-blue">Perpustakaan</span></p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" align="center">
                        <thead>
                            <tr align="center">
                                <th align="center" class="align-middle" rowspan="2">No</th>
                                <th align="center" class="align-middle" rowspan="2">NPM</th>
                                <th align="center" class="align-middle" rowspan="2">Nama Lengkap</th>
                                <th align="center" class="align-middle" rowspan="2">Jenis Kelamin</th>
                                <th align="center" class="align-middle" rowspan="2">Alamat</th>
                                <th align="center" colspan="3">Data Buku Pinjaman</th>
                                <th align="center" class="align-middle" rowspan="2">Aksi</th>
                            </tr>
                            <tr align="center">
                                <td align="center">Judul Buku</td>
                                <td align="center">Nama Pengarang</td>
                                <td align="center">Jumlah Halaman</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($members as $member)
                                <tr>
                                    <td align="center">{{$loop->iteration}}</td>
                                    <td align="center">{{$member->npm}}</td>
                                    <td align="center">{{$member->nama}}</td>
                                    <td align="center">{{$member->jenis_kelamin}}</td>
                                    <td align="center">{{$member->alamat}}</td>
                                    <td align="center">{{$member->databuku->judul_buku}}</td>
                                    <td align="center">{{$member->databuku->nama_pengarang}}</td>
                                    <td align="center">{{$member->databuku->jumlah_halaman}}</td>
                                    <td align="center">
                                        <div class="d-flex">
                                        <a href="{{route('member.edit', ['member'=>$member->id])}}" class="btn btn-warning">Edit</a>
                                        <form action="{{route('member.destroy', ['member'=>$member->id])}}" method="POST" class="ms-1">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="11">Tidak ada data...</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
