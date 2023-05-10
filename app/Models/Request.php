<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $table = 'requests';

    protected $fillable = [
        'user_id',
        'slug',
        'status',
        'link',
        'name',
        'harga',
        'qty',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
