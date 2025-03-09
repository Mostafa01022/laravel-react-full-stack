<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TAssistance extends Model
{
    use HasFactory;

    protected $table = 't_assistances';
    protected $primaryKey = 'assistance_id';
    protected $guarded = [];
}
