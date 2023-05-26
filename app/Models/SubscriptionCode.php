<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionCode extends Model
{
    use HasFactory;
    protected $filable=[
        'email','codee','plan','is_validated'
    ];
}