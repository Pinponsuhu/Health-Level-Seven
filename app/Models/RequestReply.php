<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestReply extends Model
{
    use HasFactory;

    protected $table = 'request_replies';

    protected $primaryKey = 'id';

    protected $fillable = ['message','request_id','from','to','is_read','status','hospital_id'];

    public function Requests(){
        return $this->belongsTo(Requests::class);
    }
    public function RequestReplyFiles(){
        return $this->hasMany(RequestReplyFiles::class);
    }
}
