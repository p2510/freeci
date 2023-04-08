<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FreelancerInformation extends Model
{
    use HasFactory;
    protected $fillable=[
        'tjm',
        'job',
        'domain',
        'description',
        'skills',
        'cv'
    ];

    /**
     * Get the user that owns the FreelancerInformation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function skills(): Attribute
    {
        return new Attribute(
            get: fn ($value) => explode(',',$value),
         
        );
    }
}