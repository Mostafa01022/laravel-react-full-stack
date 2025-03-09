<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TLkpOrderType extends Model
{
    use HasFactory;
    protected $table = 't_lkp_order_types';
    protected $primaryKey = 'order_type_id';
    protected $fillable = [
        'order_type_name',
    ];
}
