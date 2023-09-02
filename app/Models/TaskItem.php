<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskItem extends Model
{
    use HasFactory;
    use \Sushi\Sushi;

    public $fillable = [
        'task_id', 'task', 'remarks',
        'completed', 'completed_at',
        'category',
    ];

    protected $rows = [
        [
            'id' => 1,
            'task_id' => 1,
            'task' => 'Write some tests',
            'remarks' => '',
            'completed' => true,
            'completed_at' => '2023-09-01 22:50:23',
        ],
        [
            'id' => 2,
            'task_id' => 1,
            'task' => 'Submit PR',
            'remarks' => '',
            'completed' => false,
            'completed_at' => '',
        ],
        [
            'id' => 3,
            'task_id' => 2,
            'task' => 'Buy Dan coffee',
            'remarks' => '',
            'completed' => false,
            'completed_at' => '',
        ],
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
