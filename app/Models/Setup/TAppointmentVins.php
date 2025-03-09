<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TAppointmentVins extends Model
{
    use HasFactory;

    protected $table = 't_appointment_vins';
    protected $primaryKey = 'appointment_id';
    protected $guarded = ['appointment_id'];



}
