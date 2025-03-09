<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TSparePartItem extends Model
{
    use HasFactory;

    protected $table = 't_spare_parts_items';
    protected $primaryKey = 'item_id';
    public $incrementing = false;
    protected $fillable = ['item_id', 'item_type', 'item_group', 'item_group_id', 'item_function_group_code', 'product_group', 'business_area', 'volume', 'supplier', 'entry_date', 'item_stock_qty', 'is_discontinued', 'change_date', 'basic_u_m', 'country_of_orig', 'search_group_1', 'search_group_2', 'search_group_3', 'search_group_4', 'year_model', 'customer', 'equipment_type', 'equipment_group', 'inventory_plnd', 'returnable_ind'];
}
