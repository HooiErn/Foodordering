<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ADMIN = 1;
    const WAITER = 2;
    const KITCHEN = 3;
    const MEMBER = 4;

    const TABLE = 'users';

    protected $table = self::TABLE;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'role',
        'password',
        'session_id',
        'stripe_id',
        'pm_type',
        'pm_last_four',
        'trial_ends_at',
        'valid_date',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role()
    {
        return (int) $this->role;
    }

    public function isAdmin(): bool
    {
        return $this->role() === self::ADMIN;
    }

    public function isWaiter(): bool
    {
        return $this->role() === self::WAITER;
    }

    public function isKitchen(): bool
    {
        return $this->role() === self::KITCHEN;
    }
    public function isMember(): bool
    {
        return $this->role() === self::MEMBER;
    }
}
