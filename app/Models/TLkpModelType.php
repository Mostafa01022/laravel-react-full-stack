<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TLkpModelType extends Model
{
    use HasFactory;
    protected $table = 't_lkp_model_types';
    protected $primaryKey = 'model_type_id';
    protected $fillable = [
        'model_type_name',
        'active_flag',
        'created_by',
        'last_update_by',
    ];
}
