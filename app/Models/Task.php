<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    use \Sushi\Sushi;

    public $fillable = [
        'title', 'summary',
        'category',
    ];

    protected $rows = [
        [
            'id' => 1,
            'title' => 'Todo 1',
            'summary' => '',
        ],
        [
            'id' => 2,
            'title' => 'Todo 2',
            'meta' => '',
        ],
    ];

    public function items()
    {
        return $this->hasMany(TaskItem::class);
    }
}
