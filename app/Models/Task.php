<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public const PRIORITY_HIGH = 1;
    public const PRIORITY_MEDIUM = 2;
    public const PRIORITY_LOW = 3;

    protected $fillable = [
        'name',
        'status',
        'priority',
        'due_date',
    ];

    protected $casts = [
        'status' => 'boolean',
        'due_date' => 'date',
    ];
    
    protected $attributes = [
        'status' => false,
        'priority' => self::PRIORITY_LOW,
    ];
}
