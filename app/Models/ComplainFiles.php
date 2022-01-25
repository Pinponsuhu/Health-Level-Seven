<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplainFiles extends Model
{
    use HasFactory;

    protected $table = 'complain_files';

    protected $primaryKey = 'id';

    protected $fillable = ['complain_id','complain_title','filename'];

    public function Complain(){
        return $this->belongsTo(Complain::class);
    }
}
