<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BedSpace extends Model
{
    use HasFactory;

    protected $table ='bed_spaces';

    protected $primaryKey = 'id';

    protected $fillable = ['hospital_id','surname','othernames','status','gender','phone_number','checked_in_date','checked_in_time','bed_number','ward','next_of_kin','next_of_kin_number','doctor_name','PID'];

    public function User(){
        return $this->belongsTo(User::class);
    }
}
