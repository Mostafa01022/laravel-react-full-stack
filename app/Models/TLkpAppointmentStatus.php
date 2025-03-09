<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TLkpAppointmentStatus extends Model
{
    use HasFactory;
    protected $table = 't_lkp_appointment_status';
    protected $primaryKey = 'appointment_status_id';
    protected $fillable = ['appointment_status_name', 'active_flag', 'created_by', 'last_update_by'];
}
