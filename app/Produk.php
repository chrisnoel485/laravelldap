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
        }
    public function lokasi()
        {
           return $this->belongsTo(Lokasi::class);\
        }
    public function merek()
        {
           return $this->belongsTo(Merek::class);
        }
}
