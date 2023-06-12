<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreorderItem extends Model
{
    use HasFactory;

    protected $table = 'preorder_item';

    protected $fillable = [
        'preorder_id',
        'products_id',
        'quantity',
        'price'
    ];
    public function po(){
        return $this->belongsTo(Preorder::class, 'preorder_id');
    }
    public function pro(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
