<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


/**
 * Class User
 * @package App\Models
 * @version August 8, 2021, 3:25 am UTC
 *
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory;

    public $table = 'users';

    /**
     * @var string[]
     */

    public $fillable = [
        'login',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'login' => 'required|string|unique:users,login',
        'password' => 'required|string'
    ];
}
