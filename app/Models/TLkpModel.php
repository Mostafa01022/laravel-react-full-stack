<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TLkpModel extends Model
{
    use HasFactory;
    protected $table = 't_lkp_models';
    protected $primaryKey = 'model_id';
    protected $guarded = ['model_id'];
}
