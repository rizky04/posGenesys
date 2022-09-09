<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>

</head>

<body class="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <div class="container">
                            <div class="row m-md-6">
                                <div class="col">
                                    <a href="{{ route('barang.index') }}" type="button" class="btn btn-info">barang</a>
                                    <a href="{{ route('transaction.index') }}" type="button"
                                        class="btn btn-primary">transaksi jual</a>
                                    <a href="{{ route('transactionBeli.index') }}" type="button"
                                        class="btn btn-warning">transaksi beli</a>
                                </div>
                                <div class="col-3">

                                </div>
                                <div class="col">
                                    <ul class="navbar-nav ml-auto">
                                        <!-- Messages Dropdown Menu -->
                                        <li class="nav-item dropdown">
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf

                                                <x-dropdown-link :href="route('logout')" class="btn btn-sm btn-info"
                                                    onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                                    {{ __('Log Out') }}
                                                </x-dropdown-link>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>



</body>

</html>
