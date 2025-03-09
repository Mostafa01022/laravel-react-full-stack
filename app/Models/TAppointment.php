<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Setup\TAppointmentVins;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Yajra\DataTables\Html\Editor\Fields\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TAppointment extends Model
{
    use HasFactory;

    protected $table = 't_appointments';
    protected $primaryKey = 'appointment_id';
    protected $fillable = ['subject', 'notes', 'appointment_date', 'appointment_time', 'service_category_id', 'service_type_id', 'appointment_status_id', 'sc_location_id', 'total_price', 'net_price', 'vat', 'created_by', 'last_updated_by', 'visitor_name', 'visitor_email', 'visitor_phone', 'service_type'];

    public function attachment(): HasOne
    {
        return $this->hasOne(TServicesFile::class, 'service_id', 'appointment_id')->where('service_type_id', 1);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(TServicesFile::class, 'service_id', 'appointment_id')->where('service_type_id', 2);
    }

    public function appointmentVins(): HasOne
    {
        return $this->hasOne(TAppointmentVins::class, 'appointment_id', 'appointment_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'created_by', 'user_id');
    }

    public function status()
    {
        return $this->belongsTo(TLkpAppointmentStatus::class, 'appointment_status_id', 'appointment_status_id');
    }

    public function getAppointmentDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
