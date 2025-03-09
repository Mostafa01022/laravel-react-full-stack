<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TLkpEmergencyCharge extends Model
{
    use HasFactory;
    protected $table = 't_lkp_emergency_charges';
    protected $primaryKey = 'emergency_charge_id';
    protected $guarded = ['emergency_charge_id'];
}
