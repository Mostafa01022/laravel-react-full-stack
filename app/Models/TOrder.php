<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Services\Website\Order\OrderCalcService;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Services\Website\Customer\CurrentCustomerService;

class TOrder extends Model
{
    use HasFactory;
    protected $table = 't_orders';
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'order_no',
        'submission_date',
        'total_amount',
        'vat_amount',
        'delivery_fees',
        'subtotal_amount',
        'discount_amount',
        'promo_code',
        'request_delivery_date',
        'order_type_id',
        'order_status_id',
        'shipping_method_id',
        'address_id',
        'pickup_branch_id',
        'created_by',
        'last_update_by',
    ];

    const STATUS_NEW = 1;                          // Order New
    const STATUS_ORDER_PLACED = 2;                 // Order Placed
    const STATUS_READY_FOR_PARTIAL_PICKUP = 3;     // Ready for Partial Pick Up
    const STATUS_READY_FOR_PICKUP = 4;             // Ready for Pick Up
    const STATUS_PICKED_UP = 5;                    // Picked Up
    const STATUS_DELIVERED = 6;                    // Delivered
    const STATUS_FULLY_SHIPPED = 7;                // Fully Shipped
    const STATUS_PARTIALLY_SHIPPED = 8;            // Partially Shipped
    const STATUS_CANCEL_SUBMITTED = 9;             // Cancel Submitted
    const STATUS_ORDER_CANCELLED = 10;             // Order Cancelled
    const STATUS_RETURN_SUBMITTED = 11;            // Return Submitted
    const STATUS_ORDER_RETURNED = 12;              // Order Returned
    const STATUS_ORDER_ON_HOLD = 13;               // Order On Hold

    public function lines() :HasMany
    {
        return $this->hasMany(TOrderLine::class, 'order_id');
    }
    public function customer()
    {
        return $this->belongsTo(User::class, 'created_by','user_id');
    }
    public function orderType() :HasOne
    {
        return $this->hasOne(TLkpOrderType::class, 'order_type_id','order_type_id');
    }
    public function quotation() :HasOne
    {
        return $this->hasOne(TSPQuotationRequest::class, 'reference_id','order_id');
    }

    public function orderStatus() :HasOne
    {
        return $this->hasOne(TLkpOrderStatus::class, 'status_id','order_status_id');
    }

    public function shippingMethod() :HasOne
    {
        return $this->hasOne(TLkpShippingMethod::class, 'shipping_method_id','shipping_method_id');
    }

    public function branch() :HasOne
    {
        return $this->hasOne(TLkpBranches::class, 'branch_id','pickup_branch_id');
    }

    public function address() :HasOne
    {
        return $this->hasOne(TUserAddress::class, 'address_id','address_id');
    }

    // public function scopeReCalc()
    // {
    //     return (new OrderCalcService($this))->calc();
    // }

    // public function scopeByCurrentCustomer($q)
    // {
    //     // code here to get customer id from authenticated user
    //     // and filter orders by customer id
    //     $customerId = (new CurrentCustomerService())->info()['customer_id'];
    //     return $q->where('created_by', $customerId);
    // }

    // public function scopeByCurrentOrder($q)
    // {
    //     return $q->where('order_status_id', 0);
    // }

    public function getSubmissionDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
