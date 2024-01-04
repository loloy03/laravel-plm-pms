<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $primaryKey = 'appointment_id';
    protected $fillable = [
        'appointment_title',
        'appointment_description',
        'appointment_start_date',
        'appointment_end_date',
        'appointment_allowed_patients',
        'appointment_assigned_doctor_id'
    ];
    
    public function appointmentRequests()
    {
        return $this->hasMany(AppointmentRequest::class, 'appointment_id');
    }

    public function assignedDoctor()
    {
        return $this->belongsTo(User::class, 'appointment_assigned_doctor_id');
    }
}
