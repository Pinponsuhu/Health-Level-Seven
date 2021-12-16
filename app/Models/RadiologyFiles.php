<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RadiologyFiles extends Model
{
    use HasFactory;

    protected $table = 'radiology_files';

    protected $primaryKey = 'id';

    protected $fillable = ['file_path','upload_id'];

    public function Uploads(){
        return $this->belongsTo(RadiologyUpload::class);
    }
}
