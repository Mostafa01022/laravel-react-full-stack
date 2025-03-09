<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Superstructure  extends Model
{
    use HasFactory;
    protected $table = 'super_structures';
    protected $primaryKey = 'id';
    protected $fillable = ['id','item_code','description'];

}
