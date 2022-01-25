<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyComplain extends Model
{
    use HasFactory;

    protected $table = 'reply_complains';

    protected $primaryKey = 'id';

    protected $fillable = ['message','complain_id','from','to','is_read','status'];

    public function Complain(){
        return $this->belongsTo(Complain::class);
    }

    public function ReplyComplainFile(){
        return $this->hasMany(ReplyComplainFile::class);
    }
}
