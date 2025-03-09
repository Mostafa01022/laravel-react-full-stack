<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TOrderLine extends Model
{
    use HasFactory;
    protected $table = 't_order_lines';
    protected $primaryKey = 'order_line_id';
    protected $guarded = ['order_line_id'];

    public function item() :HasOne
    {
        return $this->hasOne(TItem::class, 'item_id','item_id');
    }

    public function itemStockStatus() :HasOne
    {
        return $this->hasOne(TLkpItemStockStatus::class, 'item_stock_status_id','line_stock_status_id');
    }

    public function scopeReCalc()
    {
        $this->line_amount = $this->item_price * $this->quantity;
        return $this;
    }
    public function sparePart()
    {
        return $this->belongsTo(TSparePartItem::class, 'item_id');
    }
    public function order()
    {
        return $this->belongsTo(TOrder::class, 'order_id');
    }
}
