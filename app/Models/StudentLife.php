<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentLife extends Model
{
    protected $table = 'student_life';
    protected $fillable = ['section', 'data'];
    protected $casts = ['data' => 'array'];
}
