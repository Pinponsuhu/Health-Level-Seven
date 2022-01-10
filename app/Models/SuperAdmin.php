<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SuperAdmin extends Authenticatable
{
    use HasFactory;

    protected $guard = 'superadmin';

    protected $table = 'super_admins';

    protected $primaryKey = 'id';

    protected $fillable = ['level','gender', 'fullname', 'password','phone_number','email_address','username'];
}
