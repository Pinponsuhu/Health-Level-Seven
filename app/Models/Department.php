<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Department extends Authenticatable
{
    use HasFactory;

    protected $guard = 'department';

    protected $table = 'departments';

    protected $primaryKey = 'id';

    protected $fillable = ['hospital_name','HID','hospital_logo','name', 'password','hospital_id','radiology_permission','bed_permission','patient_permission','appointment_permission','inventory_permission'];

    public function User(){
        return $this->belongsTo(User::class);
    }


}
