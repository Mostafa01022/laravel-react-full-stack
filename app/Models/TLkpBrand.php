<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TLkpBrand extends Model
{
    use HasFactory;
    protected $table = 't_lkp_brands';
    protected $primaryKey = 'brand_id';
    protected $fillable = [
        'brand_name',
        'active_flag',
        'created_by',
        'last_update_by'
    ];
}
