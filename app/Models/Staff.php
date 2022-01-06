<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff';

    protected $primaryKey = 'id';

    protected $fillable = ['fullname','date_of_birth','department','gender','passport','hospital_id','phone_number','email_address','house_address','next_of_kin','next_of_kin_number','staff_id','state_of_origin'];

    public function User(){
        return $this->belongsTo(User::class);
    }
}
