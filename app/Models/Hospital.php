<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $table = 'hospitals';

    protected $primaryKey = 'id';

    protected $fillable = ['hospital_id','hospital_name', 'head_of_hospital', 'email_address', 'phone_number', 'hospital_address', 'hospital_logo', 'password'];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
