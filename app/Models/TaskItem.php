<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskItem extends Model
{
    use HasFactory;

    var $fillable = [
        'task_id', 'task', 'meta',
    ];

    var $casts = [
        'meta' => 'array',
    ];

    function task()
    {
        return $this->belongsTo(Task::class);
    }
}
