<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TLkpRegion extends Model
{
    use HasFactory;
    protected $guarded = [''];
    protected $table = 't_lkp_regions';
    protected $primaryKey = 'code_id';
    protected $keyType = 'string';
}
