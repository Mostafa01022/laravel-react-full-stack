<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TLkpOrderStatus extends Model
{
    use HasFactory;
    protected $table = 't_lkp_order_statuses';
    protected $primaryKey = 'status_id';
    protected $fillable = [
        'status_name',
    ];
}
