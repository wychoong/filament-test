<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskItem extends Model
{
    use HasFactory;

    public $fillable = [
        'task_id', 'task', 'meta',
    ];

    public $casts = [
        'meta' => 'array',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
