<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item  extends Model
{
    use HasFactory;
    protected $table = 't_items';
    protected $primaryKey = 'item_id';

    const ITEM_TYPE_TRUCK_NEW = 1;
    const ITEM_TYPE_TRUCK_USED = 2;
    const ITEM_TYPE_SPARE_PART = 3;
}
