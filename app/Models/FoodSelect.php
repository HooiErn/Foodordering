<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Food;
use App\Models\FoodOption;

class FoodSelect extends Model
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

    public function foodOption(){
        return $this -> hasMany(FoodOption::class);
    }

}