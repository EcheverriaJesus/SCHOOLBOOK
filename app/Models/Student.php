<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_name',
        'paternal_surname',
        'maternal_surname',
        'grade',
        'birth_date',
        'curp',
        'gender',
        'email',
        'phone',
        'status',
        'study_plan',
        'photo',
        'id_address',
        'id_tutor',
        'id_document',
        'id_history',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_student' => 'integer',
        'birth_date' => 'date',
        'status' => 'boolean',
    ];

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function tutor(): BelongsTo
    {
        return $this->belongsTo(Tutor::class);
    }

    public function idStudent(): BelongsTo
    {
        return $this->belongsTo(IdStudent::class);
    }

    public function studentCycles(): HasMany
    {
        return $this->hasMany(StudentCycle::class);
    }

    public function contributions(): HasMany
    {
        return $this->hasMany(Contribution::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }
}
