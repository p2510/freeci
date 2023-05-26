<?php

namespace App\Models;

use App\Models\Mission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MissionApplicant extends Model
{
    use HasFactory;
    protected $fillable=[
       'user_id','budget','mission_id','accepted'
    ];

    /**
     * Get the mission that owns the MissionApplicant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mission(): BelongsTo
    {
        return $this->belongsTo(Mission::class, 'mission_id', 'id');
    }
}