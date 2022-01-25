<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyComplainFile extends Model
{
    use HasFactory;

    protected $table = 'reply_complain_files';

    protected $primaryKey = 'id';

    protected $fillable = ['complain_id','reply_id','filename'];

    public function ReplyComplain(){
        return $this->belongsTo(ReplyComplain::class);
    }
}
