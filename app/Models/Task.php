<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public $fillable = [
        'title', 'meta',
    ];

    public $casts = [
        'meta' => 'array',
    ];

    public function items()
    {
        return $this->hasMany(TaskItem::class);
    }
}
