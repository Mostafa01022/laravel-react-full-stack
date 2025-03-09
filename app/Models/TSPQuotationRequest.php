<?php

namespace App\Models;

use App\Services\Website\Customer\CurrentCustomerService;
use App\Services\Website\QuickOrder\QuotationCalcService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TSPQuotationRequest extends Model
{
    use HasFactory;
    protected $table = 't_sp_quotation_requests';
    protected $primaryKey = 'quotation_request_id';
    protected $guarded = [];
    
    const STATUS_NEW = 1;
    const STATUS_PENDING  = 20;
    const STATUS_REJECTED = 30;
    const STATUS_EXPIRED  = 70;
    const STATUS_REPLIED  = 50;
    const STATUS_ACCEPTED = 60;

    public function lines()
    {
        return $this->hasMany(TSPQuotRequestLine::class, 'quotation_request_id');
    }
    public function quotationStatus()
    {
        return $this->hasOne(TLkpQuotationStatus::class, 'quotation_status_id', 'quotation_status_id');
    }
    
    // public function scopeReCalc()
    // {
    //     return (new QuotationCalcService($this))->calc();
    // }
    
    // public function scopeByCurrentCustomer($q)
    // {    
    //     // code here to get customer id from authenticated user
    //     // and filter orders by customer id
    //     $customerId = (new CurrentCustomerService())->info()['customer_id'];
    //     return $q->where('created_by', $customerId);
    // }

    // public function scopeByCurrentQuotation($q)
    // {    
    //     return $q->where('quotation_status_id', 0);
    // }
}
