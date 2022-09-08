@extends('layouts.app')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="container">
                        <a href="{{ route('barang.create') }}" type="button" class="btn btn-primary">
                            tambah data
                        </a>
                        <h1>Barang</h1>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">no</th>
                                    <th scope="col">nama</th>
                                    <th scope="col">harga</th>
                                    <th scope="col">stok</th>
                                    <th scope="col">aksi</th>


                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @forelse ($barang as $e)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $e->nama }}</td>
                                        <td> {{ $e->harga }}</td>
                                        <td> {{ $e->stok }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('barang.destroy', $e->id) }}" method="POST">
                                                <a href="{{ route('barang.edit', $e->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Post belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $barang->links() }}
                    </div>

                </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>
@endsection
