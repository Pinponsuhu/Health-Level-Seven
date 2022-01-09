<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    use HasFactory;

    protected $table = 'inventory_items';

    protected $primaryKey = 'id';

    protected $fillable = ['hospital_id','name','item_condition','quantity','expiry_date','shelf_no','item_id','item_category','date_brought_in','delivered_by','serial_number','deliverer_number','last_edited_by'];

    public function assign(){
        return $this->hasMany(Assign::class);
    }
    public function User(){
        return $this->belongsTo(User::class);
    }
}
