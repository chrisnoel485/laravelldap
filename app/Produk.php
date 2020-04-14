<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    //
    protected $guarded = [];
    public function kategori()
        {
           return $this->belongsTo(Kategori::class);
           return $this->belongsTo(Lokasi::class);
           return $this->belongsTo(Merek::class);
        }
}
