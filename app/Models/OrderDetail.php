<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomerorder',
        'idproduct',
        'hargaproduk',
        'qty',
        'subtotalproduk',
        'note',
        'review',
        'status',
        'deleted'
    ];
}
