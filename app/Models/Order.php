<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'invoice',
        'address',
        'approved',
        'creator_id',
        'approver_id',
        'driver_id',
        'vehicle_id',
        'distance',
        'cost',
        'details',
    ];
}
