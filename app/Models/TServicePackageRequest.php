<?php

namespace App\Models;

use App\Services\Website\Customer\CurrentCustomerService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TServicePackageRequest extends Model
{
    use HasFactory;
    protected $table = 't_service_package_requests';
    protected $primaryKey = 'service_package_request_id';
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
