<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TTruckItem extends Model
{
    use HasFactory;
    protected $table = 't_truck_items';
    protected $primaryKey = 'truck_item_id';
    protected $fillable = [
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

    public function images()
    {
        return $this->hasMany(TruckImage::class, 'item_id', 'truck_item_id')->where('type','New');
    }

}
