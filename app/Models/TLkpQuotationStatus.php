<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TLkpQuotationStatus extends Model
{
    use HasFactory;
    protected $table = 't_lkp_quotation_status';
    protected $primaryKey = 'quotation_status_id';
    protected $guarded = [];
    
    const STATUS_NEW = 1;
    const STATUS_PENDING  = 20;
    const STATUS_REJECTED = 30;
    const STATUS_EXPIRED  = 70;
    const STATUS_REPLIED  = 50;
    const STATUS_ACCEPTED = 60;

}
