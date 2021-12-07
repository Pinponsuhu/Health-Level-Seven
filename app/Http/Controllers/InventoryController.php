<?php

namespace App\Http\Controllers;

use App\Models\InventoryItem;
use Exception;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function dashboard(){
        $items = InventoryItem::latest()->paginate(1);
        return view('inventory.dashboard',['items'=> $items]);
    }
    public function show_add(){
        return view('inventory.add-new-item');
    }
    public function store_add(Request $request){
        try {
            $request->validate([
                'name' => 'required',
                'quantity' => 'required|numeric',
                'shelf_number' => 'required|numeric',
                'item_status' => 'required',
                'item_category' => 'required',
                'date_brought_in' => 'required|date',
                'delivered_by' => 'required',
                'serial_number' => 'required',
                'deliverer_number' => 'required',
                'expiry_date' => 'required|nullable',
            ]);

            $item = new InventoryItem;
            $item->name = $request->name;
            $item->quantity = $request->quantity;
            $item->shelf_no = $request->shelf_number;
            $item->item_status = $request->item_status;
            $item->item_category = $request->item_category;
            $item->date_brought_in = $request->date_brought_in;
            $item->delivered_by = $request->delivered_by;
            $item->serial_number = $request->serial_number;
            $item->deliverer_number = $request->deliverer_number;
            $item->expiry_date = $request->expiry_date;
            $item->item_id = random_int(000000,999999);
            $item->save();

            return redirect('/inventory/dashboard');
        } catch (Exception $e) {
            dd($e);
        }
}
}
