<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Classroom extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'classroom_name',
        'building',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_classroom' => 'integer',
    ];

    public function classes(): BelongsTo
    {
        return $this->belongsTo(Classes::class);
    }

    public function idClassroom(): BelongsTo
    {
        return $this->belongsTo(IdClassroom::class);
    }
}
