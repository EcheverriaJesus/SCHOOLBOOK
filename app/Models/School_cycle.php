<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SchoolCycle extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_cycle',
        'cycle_name',
        'start_date',
        'end_date',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_cycle' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
        'status' => 'boolean',
    ];

    public function cycleStudents(): HasMany
    {
        return $this->hasMany(CycleStudent::class);
    }

    public function classes(): HasMany
    {
        return $this->hasMany(Class::class);
    }

    public function idCycle(): BelongsTo
    {
        return $this->belongsTo(IdCycle::class);
    }
}
