<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackQuotation extends Model
{
    use HasFactory;
    protected $table = 't_truck_quotation_requests';
    protected $primaryKey = 'truck_quotation_id';
    protected $guarded = [];
}
