<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RadiologyUpload extends Model
{
    use HasFactory;

    protected $table = 'radiology_uploads';

    protected $primaryKey = 'id';

    protected $fillable = ['full_name','phone_number','email_address','hospital_id','gender','test_type','PID'];

    public function Files(){
        return $this->hasMany(RadiologyFiles::class);
    }
}
