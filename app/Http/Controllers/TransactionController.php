<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
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
        $transaction = Transaction::latest()->paginate(5);
        $cek = Transaction::count();
        if ($cek == 0) {
            $urut = '000001';
            $nomer = 'NJ' . $urut;
        } else{
            $ambil = Transaction::all()->last();
            $urut = (int)substr($ambil->faktur, -5) + 1;
            $nomer = 'NJ' . $urut;
        }

        return view('transaksi.penjualan', compact('barang', 'nomer', 'transaction'));

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
        //
        $id = $request->id;
        $transaksi = Transaction::find($id);
        $barang = Barang::where('id', $transaksi->id_barang )->first();
        $tambahStok = $transaksi->total - $barang->stok;
        $barang->update(['stok' => $tambahStok]);

        if ($barang) {
            Transaction::create([
                'faktur' => $request->faktur,
                'id_barang' => $request->id_barang,
                'hargaSatuan' => $request->hargaSatuan,
                'total' => $request->total,
                'jumlah' => $request->jumlah

            ]);
        }

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
