<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TDeliveryCharge extends Model
{
    use HasFactory;
    protected $table = 't_lkp_delivery_charges';
    protected $primaryKey = 'delivery_charge_id';
}
