<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'status',
        'recipient',
        'image',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_notice' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
        'status' => 'boolean',
    ];

    public function idNotice(): BelongsTo
    {
        return $this->belongsTo(IdNotice::class);
    }
}
