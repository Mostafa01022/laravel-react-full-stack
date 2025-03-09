<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TLkpCity extends Model
{
    use HasFactory;
    protected $primaryKey = 'code_id';
    public $incrementing = false;
    protected $table = 't_lkp_cities';
    protected $keyType = 'string';

    protected $guarded = [];
    public function addresses()
    {
        return $this->hasMany(TUserAddress::class, 'city_id');
    }
}
