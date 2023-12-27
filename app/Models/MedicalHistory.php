<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    use HasFactory;
    protected $table = 'med_history';
    protected $primaryKey = 'medhistory_id';
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'birthdate',
        'ards',
        'anxpan',
        'arthritis',
        'asthma',
        'depress',
        'diabetes',
        'heartatk',
        'stroke',
        'visualimp',
        'allergies',
        'epilepsy',
        'hepatitis',
        'metalimp',
        'tuberculosis',
        'sexdys',
        'pregnancy',
        'others',
        'remarks',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
