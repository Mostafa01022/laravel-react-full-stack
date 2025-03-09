<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TLkpItemStockStatus extends Model
{
    use HasFactory;

    protected $table = 't_lkp_item_stock_statuses';
    protected $primaryKey = 'item_stock_status_id';
    protected $fillable = [
        'item_stock_status_name',
        'active_flag',
        'created_by',
        'last_update_by',
    ];

}
