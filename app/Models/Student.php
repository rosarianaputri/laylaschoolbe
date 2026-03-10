<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'ppdb_applications';

    protected $fillable = [
        'student_name',
        'gender',
        'birth_place',
        'birth_date',
        'previous_school',
        'parent_name',
        'phone',
        'email',
        'address',
        'status',
    ];
}