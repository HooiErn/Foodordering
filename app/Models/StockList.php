<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockList extends Model
{
    use HasFactory;

    protected $fillable =[
        'action',
        'quantity',
        'food_id',
    ];
    
    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id');
    }
}
