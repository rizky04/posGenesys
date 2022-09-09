<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Beli extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [ 'faktur','id_barang', 'total', 'hargaSatuan', 'jumlah'];

    protected $dates = ['deleted_at'];

    public function barang(){
        return $this->belongsTo(Barang::class, 'id_barang', 'id');
    }
}
