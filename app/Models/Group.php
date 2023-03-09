<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_group',
        'group_name',
        'num_max_students',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_group' => 'integer',
    ];

    public function groupClasses(): HasMany
    {
        return $this->hasMany(GroupClass::class);
    }

    public function idGroup(): BelongsTo
    {
        return $this->belongsTo(IdGroup::class);
    }
}
