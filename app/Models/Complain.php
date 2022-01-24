<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;

    protected $table = 'complains';

    protected $primaryKey = 'id';

    protected $fillable = ['title','content','from','to','status','is_read'];

    public function User(){
        return $this->belongsTo(User::class);
    }
    public function ComplainFiles(){
        return $this->hasMany(ComplainFiles::class);
    }
}
