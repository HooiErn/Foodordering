<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waiter extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'password',
        'count'
    ];
    
    public function order(){
        return $this -> hasMany(Order::class,'waiter','name');
    }
}
