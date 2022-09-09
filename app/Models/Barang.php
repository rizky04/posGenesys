<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nama', 'harga', 'stok'];
    protected $dates = ['deleted_at'];

    public function transaction(){
        return $this->hasMany(Transaction::class, 'id_barang', 'id');
    }
    public function beli(){
        return $this->hasMany(Beli::class, 'id_barang', 'id');
    }

}
