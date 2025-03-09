<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TAccount extends Model
{

    use HasFactory;

    protected $table = 't_accounts';
    protected $primaryKey = 'account_id';
    protected $keyType = 'string';
    protected $guarded = [''];

    const TYPES = [1 => ["INDIVIDUAL", "Individual"], 2 => ["COMMERCIAL", "Commercial"]];


    public function address()
    {
        return $this->hasMany(TUserAddress::class, 'account_id');
    }
    public function segmentation(): BelongsTo
    {
        return $this->belongsTo(TLkpSegmentation::class, 'segmentation_id', 'code_id');
    }

    public function paymentTerm(): BelongsTo
    {
        return $this->belongsTo(TLkpPaymentTerm::class, 'payment_terms_id', 'code_id');
    }

    public function customerIndustry(): BelongsTo
    {
        return $this->belongsTo(TLkpCustomerIndustry::class, 'customer_industry_id', 'code_id');
    }

    public function generateOtpCode(): void
    {
        $this->timestamps = false;
        $this->otp_code = rand(100000, 999999);
        $this->otp_code_expires_at = now()->addMinutes(10);
        $this->save();
    }

    public function resetOtpCode(): void
    {
        $this->timestamps = false;
        $this->otp_code = null;
        $this->otp_code_expires_at = null;
        $this->save();
    }

}
