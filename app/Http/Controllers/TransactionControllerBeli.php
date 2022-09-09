<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Beli;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionControllerBeli extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barang = Barang::all();
        $transaction = Beli::latest()->paginate(5);
        $tanggal = Carbon::now()->format('Y-m-d');
        $now = Carbon::now();
        $thnBulan = $now->year . $now->month;
        $cek = Beli::count();
        if ($cek == 0) {
            $urut = 10000001;
            $nomer = 'NB' . $thnBulan . $urut;
        } else{
            $ambil = Beli::all()->last();
            $urut = (int)substr($ambil->faktur, -8) + 1;
            $nomer = 'NB' . $thnBulan . $urut;
        }

        return view('transaksi.pembelian', compact('barang', 'nomer', 'transaction'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $transaction = [
                    'faktur' => $request->faktur,
                    'id_barang' => $request->id_barang,
                    'hargaSatuan' => $request->harga,
                    'total' => $request->total,
                    'jumlah' => $request->jumlah
        ];

        $transaksi = Beli::create($transaction);

        if($transaksi){
            $barang = Barang::where('id', $request->id_barang)->first();
            $barang->update(['stok' => $request->stok]);
            return response()->json(['success', 'data berhasil di tambahkan'], 200);
        }
        return response()->json(['success', 'sistem error'], 400);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
