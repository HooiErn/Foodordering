<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'action',
    ];
    
    public static function action($user, $action){
        $log = new Action;
        $log->name = $user;
        $log->action = $action;
        $log->save();
    }
}
