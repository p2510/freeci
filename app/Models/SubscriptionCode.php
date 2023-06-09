<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionCode extends Model
{
    use HasFactory;
    protected $fillable=[
        'email','code','plan','is_validated'
    ];
    public function getRouteKeyName()
    {
        return 'code';
    }

}