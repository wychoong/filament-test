<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Sushi\Sushi;

class TaskType extends Model
{
    use HasFactory;
    use Sushi;

    public $fillable = [
        'label',
    ];

    protected $rows = [
        [
            'id' => 1,
            'label' => 'Development',
        ],
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
