<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TLkpConfiguration extends Model
{
    use HasFactory;
    protected $table = 't_lkp_configurations';
    protected $primaryKey = 'configuration_id';
    protected $fillable = [
        'configuration_name',
        'active_flag',
        'created_by',
    ];

}
