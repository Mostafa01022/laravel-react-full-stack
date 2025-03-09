<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TLkpEmission extends Model
{
    use HasFactory;

    protected $table = 't_lkp_emissions';
    protected $primaryKey = 'emission_id';
    protected $fillable = [
        'emission_name',
        'active_flag',
        'created_by',
        'last_update_by',
    ];

}
