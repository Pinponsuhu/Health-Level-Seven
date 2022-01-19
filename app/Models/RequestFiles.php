<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestFiles extends Model
{
    use HasFactory;

    protected $table = 'request_files';

    protected $primaryKey = 'id';

    protected $fillable = ['requests_id','request_title','filename'];

    public function Requests(){
        return $this->belongsTo(Requests::class);
    }
}
