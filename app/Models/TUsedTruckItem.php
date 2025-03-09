<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TUsedTruckItem extends Model
{
    use HasFactory;
    protected $table = 't_used_truck_items';
    protected $primaryKey = 'used_truck_item_id';
    protected $fillable = [
        'item_serial_number',
        'millage',
        'price',
        'item_id',
        'model_year',
        'horse_power',
        'model_id',
        'brand_id',
        'model_type_id',
        'emission_id',
        'configuration_id',
        'fuel_type_id',
        'active_flag',
        'created_by',
        'last_update_by'
    ];

    public function item(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TItem::class, 'item_id', 'item_id');
    }

    public function images()
    {
        return $this->hasMany(TruckImage::class, 'item_id', 'used_truck_item_id')->where('type','Used');
    }

}
