<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $guard = [];

    protected $fillable = [
        'title',
        'is_done',
    ];

    protected $casts = [
        'is_done' => 'boolean',
    ];
}
