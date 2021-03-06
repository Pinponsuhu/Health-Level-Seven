<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['hospital_name', 'head_of_hospital', 'email_address', 'phone_number', 'hospital_address', 'hospital_logo', 'password'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Department(){
        return $this->hasMany(Department::class);
    }

    public function Staff(){
        return $this->hasMany(Staff::class);
    }
    public function Patient(){
        return $this->hasMany(Patient::class);
    }
    public function Appointment(){
        return $this->hasMany(Appointment::class);
    }
    public function InventoryItem(){
        return $this->hasMany(InventoryItem::class);
    }
    public function BedSpace(){
        return $this->hasMany(BedSpace::class);
    }
    public function RadiologyUpload(){
        return $this->hasMany(RadiologyUpload::class);
    }
    public function Request(){
        return $this->hasMany(Requests::class);
    }
}
