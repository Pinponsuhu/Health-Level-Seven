<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{
    use HasFactory;

    protected $table = 'assigns';

    protected $id = 'id';

    protected $fillable = ['hospital_id','itemr_id','assigned_to','number_of_item','issued_by','issue_to'];

    public function item(){
        return $this->belongsTo(InventoryItem::class);
    }
}
