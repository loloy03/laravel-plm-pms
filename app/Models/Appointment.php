<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'appointment_title',
        'appointment_description',
        'appointment_start_date',
        'appointment_end_date',
        'appointment_assigned_doctor'
    ];
}
