<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TLkpFuelType extends Model
{
    use HasFactory;

    protected $table = 't_lkp_fuel_types';
    protected $primaryKey = 'fuel_type_id';
    protected $fillable = [
        'fuel_type_name',
        'active_flag',
        'created_by',
        'last_update_by',
    ];
}
