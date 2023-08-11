<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable =[
        'food_id',
        'table_id',
        'quantity',
        'orderID',
        'addon',
    ];
    
    public function food(){
        return $this->belongsTo(Food::class, 'food_id');
    }
}
