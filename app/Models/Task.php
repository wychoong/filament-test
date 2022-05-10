<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    var $fillable = [
        'title', 'meta',
    ];

    var $casts = [
        'meta' => 'array',
    ];

    function items()
    {
        return $this->hasMany(TaskItem::class);
    }
}
