<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TSPQuotRequestLine extends Model
{
    use HasFactory;
    protected $table = 't_sp_quot_request_lines';
    protected $primaryKey = 'quotation_line_id';
    protected $guarded = [];
     
    public function item() :HasOne
    {
        return $this->hasOne(TItem::class, 'item_id','item_id');
    }

    public function scopeReCalc()
    {
        $this->line_amount = $this->item_price * $this->quantity;
        return $this;
    }
}
