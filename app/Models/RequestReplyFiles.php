<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestReplyFiles extends Model
{
    use HasFactory;

    protected $table = 'request_reply_files';

    protected $primaryKey = 'id';

    protected $fillable = ['request_id','reply_id','filename'];

    public function Requests(){
        return $this->belongsTo(RequestReply::class);
    }
}
