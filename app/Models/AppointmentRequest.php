<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentRequest extends Model
{
    use HasFactory;

    protected $primaryKey = 'appointment_request_id';
    protected $fillable = [
        'status',
        'first_name',
        'last_name',
        'user_id',
        'appointment_id',
    ];

    public $timestamps = false;  // Disable automatic timestamps

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}