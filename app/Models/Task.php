<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Sushi\Sushi;

class Task extends Model
{
    use HasFactory;
    use Sushi;

    public $fillable = [
        'title', 'summary', 'meta',
        'checkbox', 'color', 'select', 'toggle',
        'task_type_id',
    ];

    protected $rows = [
        [
            'id' => 1,
            'title' => 'Todo 1',
            'summary' => 'summary',
            'meta' => '',
            'checkbox' => true,
            'color' => '#000',
            'select' => 1,
            'toggle' => true,
            'order' => 2,
        ],
        [
            'id' => 2,
            'title' => 'Todo 2',
            'summary' => 'summary',
            'meta' => '',
            'checkbox' => false,
            'color' => '#FFF',
            'select' => 3,
            'toggle' => true,
            'order' => 1,
        ],
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function items()
    {
        return $this->hasMany(TaskItem::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(TaskType::class);
    }
}
