<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test7 extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'surname', 'age', 'gender', 'price',
        'description', 'paragraph', 'email', 'phone',
        'password', 'address', 'url', 'mac', 'ipv4',
        'username', 'useragent', 'image', 'extension'
    ];
}
