<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemStoreLogs extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'created_at',
        'id_item'
    ];
}
