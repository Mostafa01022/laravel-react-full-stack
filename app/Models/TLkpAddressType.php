<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TLkpAddressType extends Model
{
    use HasFactory;
    protected $table = 't_lkp_address_types';
    protected $primaryKey = 'address_type_id';
    protected $fillable = [
        'address_type_name',
        'active_flag',
        'created_by',
        'last_update_by',
    ];
    public function addresses()
    {
        return $this->hasMany(TUserAddress::class, 'address_type_id');
    }


}
