<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-3 gap-4 text-center ...">


                        <div><a class="" type="buttong" href="{{ route('barang.index') }}">BARANG</a></div>
                        <div><a class="" type="buttong" href="{{ route('transaction.index') }}">TRANSAKSI</a></div>
                        <div><a class="" type="buttong" href="">LAPORAN</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
