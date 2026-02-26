<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PpdbApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_code',
        'student_name',
        'gender',
        'birth_place',
        'birth_date',
        'previous_school',
        'parent_name',
        'phone',
        'email',
        'address',
        'notes',
        'status',
        'approved_at',
        'approved_by',
    ];

    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
            'approved_at' => 'datetime',
        ];
    }

    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
