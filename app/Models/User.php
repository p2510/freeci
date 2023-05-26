<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use App\Models\View;
use App\Models\Message;
use App\Models\Recommended;
use App\Models\Subscription;
use Laravel\Sanctum\HasApiTokens;
use App\Models\FreelancerInformation;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'profil_photo',
        'visibility',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getRouteKeyName()
    {
        return 'name';
    }

    public function createdAt(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Carbon::parse($value)->locale('fr_FR')->diffForHumans(),
        );
    }



    /**
     * Get the freelancer_informations associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function freelancerInformations (): HasOne
    {
        return $this->hasOne(FreelancerInformation::class, 'user_id', 'id');
    }

    /**
     * Get all of the recommend for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recommendeds(): HasMany
    {
        return $this->hasMany(Recommended::class, 'user_id', 'id');
    }

    /**
     * Get the subscription associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function subscription(): HasOne
    {
        return $this->hasOne(Subscription::class, 'user_id', 'id');
    }

    /**
     * Get the views associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function views(): HasMany
    {
        return $this->hasMany(View::class, 'user_id', 'id');
    }

    /**
     * Get all of the messages for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class, 'user_id', 'id');
    }
}