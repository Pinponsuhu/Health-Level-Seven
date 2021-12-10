<?php

namespace App\Http\Controllers;

use App\Models\Assign;
use App\Models\InventoryItem;
use Exception;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function dashboard(){
        $meds = InventoryItem::where('item_category','=','Medicinal')->count();
        $stationery = InventoryItem::where('item_category','=','Stationery')->count();
        $assign_count = Assign::all()->count();
        $stock_count = InventoryItem::where('quantity','!=','0')->count();
        $items = InventoryItem::latest()->limit(3)->get();
        return view('inventory.dashboard',['items'=> $items,'stock_count'=>$stock_count,'assign_count'=>$assign_count,'meds'=>$meds,'stationery'=>$stationery]);
    }
    public function view_all(){
        $items = InventoryItem::orderBy('name')->paginate(20);
        return view('inventory.view-all',['items'=> $items]);
    }
    public function filter(Request $request){

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
            $item->item_condition = $request->item_condition;
            $item->expiry_date = $request->expiry_date;
            $item->item_id = random_int(000000,999999);
            $item->save();

            return redirect('/inventory/dashboard');
        } catch (Exception $e) {
            dd($e);
        }
}
public function search_items(Request $request){
    $items = InventoryItem::orderBy('name')->where('name', '=', $request->search)
    ->orWhere('shelf_no','=',$request->search)
    ->orWhere('item_status','=',$request->search)
    ->orWhere('item_category','=',$request->search)
    ->orWhere('date_brought_in','=',$request->search)->get();

    $search = $request->search;

    return view('inventory.search-items', ['items'=>$items,'search'=>$search]);
    }
    public function item_details($id){
        $item = InventoryItem::find($id);
        $history_count = Assign::where('itemr_id','=',$id)->count();
            $history = Assign::where('itemr_id','=',$id)->get();


        return view('inventory.item-details',['item'=> $item,'history'=> $history,'history_count'=>$history_count]);
    }
    public function assign($id){
        $item = InventoryItem::find($id);
        return view('inventory.assign-item',['item'=>$item]);
    }
    public function store_assign(Request $request){
        $request->validate([
            'assigned_to' => 'required',
            'number_of_item' => 'required',
            'issued_by' => 'required',
            'issued_to' => 'required',
        ]);
        $assign = new Assign;
        $assign->itemr_id = $request->item_id_no;
        $assign->assigned_to = $request->assigned_to;
        $assign->number_of_item = $request->number_of_item;
        $assign->issued_by = $request->issued_by;
        $assign->issue_to = $request->issued_to;
        $assign->save();


        $item = InventoryItem::where('id','=',$request->item_id_no)->first();
        $number = $item->quantity - $request->number_of_item;
        $item->quantity = $number;
        $item->save();

        return redirect('/all/items');
    }
    public function delete_item($id){
        $item = InventoryItem::find($id);
        $item->delete();

        return redirect('/inventory/dashboard');
    }
    public function edit_item($id){
        $condition = array('Good','Bad','Broken Seal','Returned');
        $category = array('Medicinal','Stationery','Hardware','Others');
        $status = array('In stock','Assigned');
        $item = InventoryItem::find($id);
        return view('inventory.edit-item',['item'=>$item]);

    }
    public function store_edit(Request $request){
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
        $item = InventoryItem::find($request->id);
            $item->name = $request->name;
            $item->quantity = $request->quantity;
            $item->shelf_no = $request->shelf_number;
            $item->item_status = $request->item_status;
            $item->item_category = $request->item_category;
            $item->date_brought_in = $request->date_brought_in;
            $item->delivered_by = $request->delivered_by;
            $item->serial_number = $request->serial_number;
            $item->deliverer_number = $request->deliverer_number;
            $item->item_condition = $request->item_condition;
            $item->save();
    }

}