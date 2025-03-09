<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TLkpBranches extends Model
{
    use HasFactory;
    protected $table = 't_lkp_branches';
    protected $primaryKey = 'branch_id';
    protected $fillable = [
        'branch_name',
        'city_id',
        'address',
    ];
}
