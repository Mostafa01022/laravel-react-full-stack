<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TLkpShippingMethod extends Model
{
    use HasFactory;
    protected $table = 't_lkp_shipping_methods';
    protected $primaryKey = 'shipping_method_id';
    protected $fillable = [
        'shipping_method_name'
    ];
}
