<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TLkpServicePackage extends Model
{
    use HasFactory;
    protected $table = 'tlkp_service_packages';
    protected $primaryKey = 'service_package_id';
    protected $guarded = [];
}
