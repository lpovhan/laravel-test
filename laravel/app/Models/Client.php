<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    public $fillable = [
        'key',
        'value'
    ];

    public $timestamps = false;

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'key' => 'required|string|max:255|unique:clients,key',
        'value' => 'required|max:255|string'
    ];
}
