<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TServicesFile extends Model
{
    use HasFactory;
    protected $table = 't_services_files';
    protected $primaryKey = 'service_file_id';
    protected $guarded = [];
}
