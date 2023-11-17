<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'name',
        'consumption',
        'service_schedule',
        'condition',
        'details'
    ];

    public function orders () {
        
    }

}
