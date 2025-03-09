<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TItem extends Model
{
    use HasFactory;

    protected $table = 't_items';
    protected $primaryKey = 'item_id';
    protected $fillable = [
        'item_name',
        'item_description',
        'item_no',
        'item_code',
        'uom_id',
        'brand_id',
        'item_stock_status_id',
        'item_type_id',
        'category_id',
        'created_by',
        'last_update_by',
        'weight',
        'eligible_for_cart',
        'eligible_for_quote',
    ];

    const ITEM_TTPE_TRUCK_NEW = 1;
    const ITEM_TTPE_TRUCK_USED = 2;
    const ITEM_TTPE_SPARE_PART = 3;

    function scopeTypeSparePart($q)
    {
        $q->where('t_items.item_type_id', self::ITEM_TTPE_SPARE_PART);
    }

    public function brand(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TLkpBrand::class, 'brand_id', 'brand_id');
    }

    // function sparePart()
    // {
    //     return $this->belongsTo(TSparePartItem::class, 'item_id', 'item_id');
    // }
}
