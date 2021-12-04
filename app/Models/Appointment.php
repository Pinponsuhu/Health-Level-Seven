<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table ='appointments';

    protected $primaryKey = 'id';

    protected $fillable = ['surname','othernames','preferred_date','gender','appointment_type','doctor_type','phone_number','email_address'];
}
