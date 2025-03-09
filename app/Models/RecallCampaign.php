<?php

namespace App\Models;

use App\Services\Website\Customer\CurrentCustomerService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecallCampaign extends Model
{
    use HasFactory;

    protected $table = 'recall_campaigns';
    protected $primaryKey = 'recall_id';
    protected $fillable = [
        'vin_number',
        'item_number',
        'name',
        'phone',
        'email',
    ];
    public function customer()
    {
        return $this->belongsTo(User::class, 'created_by', 'user_id');
    }
}
