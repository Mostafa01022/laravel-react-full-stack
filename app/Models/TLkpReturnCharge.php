<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TLkpReturnCharge extends Model
{
    use HasFactory;
    protected $table = 't_lkp_return_charges';
    protected $primaryKey = 'return_charge_id';
    protected $guarded = ['return_charge_id'];
}
