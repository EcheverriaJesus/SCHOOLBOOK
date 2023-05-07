<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'subject_id',
        'cycle_id',
        'status'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function groupCourses(): HasMany
    {
        return $this->hasMany(Group_course::class);
    }

    public function studentCourses(): HasMany
    {
        return $this->hasMany(Student_course::class);
    }

    public function courseSchedules(): HasMany
    {
        return $this->hasMany(CourseSchedule::class);
    }

    public function schoolCycles(): BelongsTo
    {
        return $this->belongsTo(School_cycle::class, 'cycle_id');
    }

    public function qualifications(): HasMany
    {
        return $this->hasMany(Qualification::class);
    }
}
