<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Qualification extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_qualification',
        'bim1',
        'bim2',
        'bim3',
        'bim4',
        'bim5',
        'promedio_final',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_qualification' => 'integer',
        'bim1' => 'float',
        'bim2' => 'float',
        'bim3' => 'float',
        'bim4' => 'float',
        'bim5' => 'float',
        'promedio_final' => 'float',
    ];

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function idQualification(): BelongsTo
    {
        return $this->belongsTo(IdQualification::class);
    }
}
