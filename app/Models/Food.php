<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FoodSelect;

class Food extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'image',
        'available',
        'stock',
        'price',
        'categoryID',
    ];

    public function foodSelect(){
        return $this -> hasMany(FoodSelect::class);
    }
}
