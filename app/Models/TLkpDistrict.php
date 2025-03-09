<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TLkpDistrict extends Model
{
    use HasFactory;
    protected $guarded = [''];
    protected $table = 't_lkp_districts';
    protected $primaryKey = 'code_id';
    protected $keyType = 'string';
}
