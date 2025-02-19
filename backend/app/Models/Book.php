<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name', 'type', 'author', 'pages', 'price', 'synopsis', 'available',
    ];
}
