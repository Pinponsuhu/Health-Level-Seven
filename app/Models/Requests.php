<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;

    protected $table = 'requests';

    protected $primaryKey = 'id';

    protected $fillable = ['title','content','from','to','status','is_read','hospital_id'];

    public function RequestFiles(){
        return $this->hasMany(RequestFiles::class);
    }
    public function RequestReply(){
        return $this->hasMany(RequestReply::class);
    }
}
