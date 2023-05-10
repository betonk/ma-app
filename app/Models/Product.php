<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
class Product extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
