<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table ='patients';

    protected $primaryKey = 'id';

    protected $fillable = ['hospital_id','passport','surname','othernames','date_of_birth','gender','phone_number','email_address','state_of_origin','occupation','resident_address','PID','next_of_kin','next_of_kin_number1','next_of_kin_number2'];
}

