@extends('layouts.app')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="container">

                        <h1>Barang</h1>
                        <form method="POST" action="{{ route('barang.update', $barang->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama">nama barang</label>
                                <input type="text" class="form-control" name="nama"
                                    value="{{ $barang->nama }}"></input>

                            </div>
                            <div class="form-group">
                                <label for="harga">harga</label>
                                <input type="number" class="form-control" value="{{ $barang->harga }}"
                                    name="harga"></input>
                            </div>
                            <div class="form-group">
                                <label for="stok">stok</label>
                                <input type="number" class="form-control" name="stok"
                                    value="{{ $barang->stok }}"></input>
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </form>

                    </div>

                </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>
@endsection
