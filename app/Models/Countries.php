<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    use HasFactory;
    protected $table = 't_lkp_countries';
    protected $primaryKey = 'code_id';
    protected $guarded = [];
}
