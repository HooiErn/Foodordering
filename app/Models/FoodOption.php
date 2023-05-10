<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FoodSelect;

class FoodOption extends Model
{
    use HasFactory;
    protected $fillable = [
        'food_select_id', 
        'name'
    ];

    public function foodSelect()
    {
        return $this->belongsTo(FoodSelect::class);
    }
}

