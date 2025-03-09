<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TUserAddress extends Model
{
    use HasFactory;

    protected $table = 't_user_addresses';

    protected $primaryKey = 'address_id';

    protected $guarded = [
        'address_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function city()
    {
        return $this->belongsTo(TLkpCity::class, 'city_id', 'code_id');
    }

    public function addressType()
    {
        return $this->belongsTo(TLkpAddressType::class, 'address_type_id');
    }

    public function country()
    {
        return $this->belongsTo(TLkpCountry::class, 'country_id', 'code_id');
    }

    public function region()
    {
        return $this->belongsTo(TLkpRegion::class, 'region_id', 'code_id');
    }

    public function district()
    {
        return $this->belongsTo(TLkpDistrict::class, 'district_id', 'code_id');
    }
}
