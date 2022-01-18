<?php

namespace App\Http\Controllers;

use App\Models\Assign;
use App\Models\InventoryItem;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(){
        $meds = InventoryItem::where('hospital_id','=',auth()->user()->id)
        ->where('item_category','=','Medicinal')
        ->count();
        $stationery = InventoryItem::where('hospital_id','=',auth()->user()->id)
        ->where('item_category','=','Stationery')
        ->count();
        $assign_count = Assign::where('hospital_id','=',auth()->user()->id)
        ->count();
        $stock_count = InventoryItem::where('quantity','!=','0')
        ->where('hospital_id','=',auth()->user()->id)
        ->count();
        $items = InventoryItem::latest()
        ->where('hospital_id','=',auth()->user()->id)
        ->limit(3)
        ->get();
        return view('inventory.dashboard',['items'=> $items,'stock_count'=>$stock_count,'assign_count'=>$assign_count,'meds'=>$meds,'stationery'=>$stationery]);
    }

    public function view_all(){
        $items = InventoryItem::orderBy('name')
                ->where('hospital_id','=',auth()->user()->id)
                ->paginate(20);
        return view('inventory.view-all',['items'=> $items]);
    }

    public function show_add(){
        return view('inventory.add-new-item');
    }

    public function store_add(Request $request){
            $request->validate([
                'name' => 'required',
                'quantity' => 'required|numeric',
                'shelf_number' => 'required|numeric',
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
            $item->item_category = $request->item_category;
            $item->date_brought_in = $request->date_brought_in;
            $item->delivered_by = $request->delivered_by;
            $item->hospital_id = auth()->user()->id;
            $item->serial_number = $request->serial_number;
            $item->deliverer_number = $request->deliverer_number;
            $item->item_condition = $request->item_condition;
            $item->expiry_date = $request->expiry_date;
            $item->last_edited_by = 'Admin';
            $item->item_id = random_int(000000,999999);
            $item->save();

            return redirect('/inventory/dashboard');
}

public function search_items(Request $request){
    $items = InventoryItem::orderBy('name')->where('name', '=', $request->search)
    ->where('hospital_id','=',auth()->user()->id)
    ->orWhere('shelf_no','=',$request->search)
    ->orWhere('item_status','=',$request->search)
    ->orWhere('item_category','=',$request->search)
    ->orWhere('date_brought_in','=',$request->search)->get();
    $search = $request->search;
    return view('inventory.search-items', ['items'=>$items,'search'=>$search]);
    }

    public function item_details($id){
        $item = InventoryItem::find(Crypt::decrypt($id));
        if($item->hospital_id == auth()->user()->id){
            $history_count = Assign::where('itemr_id','=',$id)
                        ->where('hospital_id','=',auth()->user()->id)
                        ->count();
            $history = Assign::where('itemr_id','=',$id)
                        ->where('hospital_id','=',auth()->user()->id)
                        ->get();


        return view('inventory.item-details',['item'=> $item,'history'=> $history,'history_count'=>$history_count]);
        }else{
            return redirect()->back();
        }
    }

    public function assign($id){
        $item = InventoryItem::find(Crypt::decrypt($id));
        if($item->hospital_id == auth()->user()->id){
            return view('inventory.assign-item',['item'=>$item]);
        }else{
            return back();
        }
    }

    public function store_assign(Request $request){
        $request->validate([
            'assigned_to' => 'required',
            'number_of_item' => 'required',
            'issued_by' => 'required',
            'issued_to' => 'required',
        ]);
        $assign = new Assign;
        $assign->itemr_id = Crypt::decrypt($request->id);
        $assign->assigned_to = $request->assigned_to;
        $assign->number_of_item = $request->number_of_item;
        $assign->issued_by = $request->issued_by;
        $assign->hospital_id = auth()->user()->id;
        $assign->issue_to = $request->issued_to;
        $assign->save();
        $item = InventoryItem::where('id','=',$request->item_id_no)->first();
        $number = $item->quantity - $request->number_of_item;
        $item->quantity = $number;
        $item->save();

        return redirect('/all/items');
    }

    public function delete_item($id){
        $item = InventoryItem::find(Crypt::decrypt($id));
        if($item->hospital_id == auth()->user()->id){
            $item->delete();
        }else{
            return redirect()->back();
        }
        return redirect('/inventory/dashboard');
    }

    public function edit_item($id){
        $conditions = array('Good','Bad','Broken Seal');
        $categories = array('Medicinal','Stationery','Hardware','Others');
        $status = array('In stock','Assigned');
        $item = InventoryItem::find(Crypt::decrypt($id));
        if($item->hospital_id == auth()->user()->id){
            return view('inventory.edit-item',['item'=>$item,'categories'=> $categories,'conditions' => $conditions]);
        }else{
            return redirect()->back();
        }
    }

    public function store_edit(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|numeric',
            'shelf_number' => 'required|numeric',
            'item_category' => 'required',
            'item_condition' => 'required',
            'date_brought_in' => 'required|date',
            'delivered_by' => 'required',
            'serial_number' => 'required',
            'deliverer_number' => 'required',
        ]);
        $item = InventoryItem::find(Crypt::decrypt($request->id));
            $item->name = $request->name;
            $item->quantity = $request->quantity;
            $item->shelf_no = $request->shelf_number;
            $item->item_category = $request->item_category;
            $item->item_condition = $request->item_condition;
            $item->date_brought_in = $request->date_brought_in;
            $item->delivered_by = $request->delivered_by;
            $item->serial_number = $request->serial_number;
            $item->deliverer_number = $request->deliverer_number;
            $item->item_condition = $request->item_condition;
            $item->last_edited_by = 'Admin';
            $item->save();

            return redirect('/inventory/dashboard');
    }

}
