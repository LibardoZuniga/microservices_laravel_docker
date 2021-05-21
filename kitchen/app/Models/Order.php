<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'created_at',
    ];

    protected $hidden = [
        'updated_at'
    ];

    public function recipe(){
        return $this->belongsTo(Recipes::class);
    }
}
