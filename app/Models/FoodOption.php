<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FoodSelect;

class FoodOption extends Model
{
    use HasFactory;
    protected $fillable =[
        'food_id',
        'name',
    ];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}

