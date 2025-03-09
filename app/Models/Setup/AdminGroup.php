<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminGroup extends Model
{
    use HasFactory;

    protected $table = "sys_admin_groups";
    protected $primaryKey = "id";
    protected $fillable = [
        'group_name', 'privilege'
    ];


}
