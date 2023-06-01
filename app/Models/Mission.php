<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Message;
use Laravel\Scout\Searchable;
use App\Models\MissionApplicant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mission extends Model
{
    use HasFactory , Searchable;
    protected $fillable=[
        'title','type_mission','type_budget','category','budget_min','budget_max','tags','description','code','phone','statut'
    ];
    /**
     * Get all of the mission_applicants for the Mission
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function  mission_applicants(): HasMany
    {
        return $this->hasMany(MissionApplicant::class, 'mission_id', 'id');
    }
    /**
     * Get all of the messages for the Mission
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class, 'mission_id', 'id');
    }
    
    
    public function getRouteKeyName()
    {
        return 'title';
    }
    public function createdAt(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Carbon::parse($value)->locale('fr_FR')->diffForHumans(),
        );
    }
    public function tags(): Attribute
    {
        return new Attribute(
            get: fn ($value) => explode(',',$value),
         
        );
    }

    public function toSearchableArray():array
        {
            return [
                'title' => (string) $this->title,
                'category' =>(string) $this->category,
                'tags' => (string) $this->tags,
            ];
        }
}