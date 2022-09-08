@extends('layouts.app')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="container">
                        <form action="{{ route('barang.store') }}">
                            <div class="form-row">
                                <div class="col">
                                    <label for="faktur">faktur</label>
                                    <input type="text" class="form-control" value="{{ $nomer }}" name="faktur"
                                        id="faktur">
                                </div>
                                <div class="col">
                                    <label for="id_barang">barang</label>
                                    <select class="form-control" name="id_barang" id="id_barang">
                                        <option selected>Open this select menu</option>
                                        @foreach ($barang as $a)
                                            <option value="{{ $a->id }}}">{{ $a->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="stok">stok</label>
                                    <input type="text" class="form-control" id="stok" name="stok" readonly>
                                </div>

                            </div>
                            <div class="form-row mt-3">
                                <div class="col">
                                    <label for="harga">harga</label>
                                    <input type="text" class="form-control" id="hargaSatuan" name="hargaSatuan" readonly>
                                </div>
                                <div class="col">
                                    <label for="total">total</label>
                                    <input type="text" class="form-control" name="total" id="total">
                                </div>
                                <div class="col">
                                    <label for="jumlah">jumlah</label>
                                    <input type="text" class="form-control" name="jumlah" id="jumlah" readonly>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>


                <div class="container">

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
                            @forelse ($transaction as $e)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $e->faktur }}</td>
                                    <td>{{ $e->id_barang }}</td>
                                    <td> {{ $e->total }}</td>
                                    <td> {{ $e->hargaSatuan }}</td>
                                    <td>{{ $e->jumlah }}</td>

                                </tr>
                            @empty
                                <div class="alert alert-danger mt-2">
                                    Data belum Tersedia.
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $transaction->links() }}
                </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#id_barang').change(function() {
                let id = $(this).val()
                $.ajax({
                    url: "{{ route('getBarang') }}",
                    type: 'post',
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(res) {
                        console.log(res);
                        $('#hargaSatuan').val(res.hargaSatuan)
                        $('#stok').val(res.stok)
                    }
                })
            })
        })

        $(document).on('blur', '#total', function() {
            let hargaSatuan = parseInt($('#hargaSatuan').val())
            let total = parseInt($(this).val())
            let stok = parseInt($('#stok').val()) - total

            if (stok < 5) {
                alert("stok kurang dari 5");
                $('#total').attr('disable', true);
                $('#jumlah').attr('disable', true);
                $('#jumlah').val("tidak bisa transaksi");

            } else {
                $('#stok').val(stok)
                $('#jumlah').val(total * harga)
            }


        })
    </script>
@endsection
