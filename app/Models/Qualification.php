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
        'p1',
        'p2',
        'p3',
        'promedio',
        'calificacion_final',   
        'tipo_evaluacion',
        'course_id',
        'student_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'p1' => 'float',
        'p2' => 'float',
        'p3' => 'float',
        'promedio' => 'float',
        'calificacion_final' => 'float',
        'tipo_evaluacion' => 'integer',
    ];

    protected static function booted()
    {
        static::updating(function ($qualification) {
            // Verificar si todas las calificaciones están presentes
            if ($qualification->p1 !== null && $qualification->p2 !== null && $qualification->p3 !== null) {
                // Calcular promedio final
                $promedio = ($qualification->p1 + $qualification->p2 + $qualification->p3) / 3;

                // Redondear según las reglas solo si es mayor o igual a 6
                if ($promedio >= 6) {
                    if ($promedio - floor($promedio) >= 0.5) {
                        $promedio = ceil($promedio);
                    } else {
                        $promedio = floor($promedio);
                    }
                }

                $qualification->promedio = $promedio;
            } else {
                $qualification->promedio = null;
            }
        });
    }



    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
