<?php

namespace App\Http\Controllers;

use App\Models\Assign;
use App\Models\InventoryItem;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class DepartmentInventory extends Controller
{
    public function __construct()
    {
        $this->middleware(['department','invt']);
    }

    public function dashboard(){
        $meds = InventoryItem::where('hospital_id','=',auth()->guard('department')->user()->hospital_id)
        ->where('item_category','=','Medicinal')
        ->count();
        $stationery = InventoryItem::where('hospital_id','=',auth()->guard('department')->user()->hospital_id)
        ->where('item_category','=','Stationery')
        ->count();
        $assign_count = Assign::where('hospital_id','=',auth()->guard('department')->user()->hospital_id)
        ->count();
        $stock_count = InventoryItem::where('quantity','!=','0')
        ->where('hospital_id','=',auth()->guard('department')->user()->hospital_id)
        ->count();
        $items = InventoryItem::latest()
        ->where('hospital_id','=',auth()->guard('department')->user()->hospital_id)
        ->limit(3)
        ->get();

        $shelf_no =  User::select('shelf_number')
        ->where('id', auth()->guard('department')->user()->hospital_id)->first();
        return view('department.inventory.dashboard',['items'=> $items,'stock_count'=>$stock_count,'assign_count'=>$assign_count,'meds'=>$meds,'stationery'=>$stationery,'shelf_no'=> $shelf_no]);
    }

    public function view_all(){
        $items = InventoryItem::orderBy('name')
                ->where('hospital_id','=',auth()->guard('department')->user()->hospital_id)
                ->paginate(20);
        return view('department.inventory.view-all',['items'=> $items]);
    }

    public function show_add(){
        $shelf_no =  User::where('id', auth()->guard('department')->user()->hospital_id)->first();
        $no = (int)$shelf_no->shelf_number;
        return view('department.inventory.add-new-item', ['no'=> $no]);
    }

    public function store_add(Request $request){
        try {
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
            $item->hospital_id = auth()->guard('department')->user()->hospital_id;
            $item->serial_number = $request->serial_number;
            $item->deliverer_number = $request->deliverer_number;
            $item->item_condition = $request->item_condition;
            $item->expiry_date = $request->expiry_date;
            $item->last_edited_by = auth()->guard('department')->user()->name;
            $item->item_id = random_int(000000,999999);
            $item->save();

            return redirect('/department/inventory/dashboard');
        } catch (Exception $e) {
            dd($e);
        }
}
    public function search_items(Request $request){
        $items = InventoryItem::orderBy('name')->where('name', '=', $request->search)
        ->where('hospital_id','=',auth()->guard('department')->user()->hospital_id)
        ->orWhere('shelf_no','=',$request->search)
        ->orWhere('item_category','=',$request->search)
        ->orWhere('date_brought_in','=',$request->search)->get();
        $search = $request->search;
        return view('department.inventory.search-items', ['items'=>$items,'search'=>$search]);
    }

    public function item_details($id){
        $item = InventoryItem::find(Crypt::decrypt($id));
        if($item->hospital_id == auth()->guard('department')->user()->hospital_id){
            $history_count = Assign::where('itemr_id','=',Crypt::decrypt($id))
                        ->where('hospital_id','=',auth()->guard('department')->user()->hospital_id)
                        ->count();
            $history = Assign::where('itemr_id','=',Crypt::decrypt($id))
                        ->where('hospital_id','=',auth()->guard('department')->user()->hospital_id)
                        ->get();


        return view('department.inventory.item-details',['item'=> $item,'history'=> $history,'history_count'=>$history_count]);
        }else{
            return redirect()->back();
        }
    }

    public function assign($id){
        $item = InventoryItem::find(Crypt::decrypt($id));
        return view('department.inventory.assign-item',['item'=>$item]);
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
        $assign->hospital_id = auth()->guard('department')->user()->hospital_id;
        $assign->issue_to = $request->issued_to;
        $assign->save();
        $item = InventoryItem::where('id','=',$request->item_id_no)->first();
        $number = $item->quantity - $request->number_of_item;
        $item->quantity = $number;
        $item->save();

        return redirect('/department/all/items');
    }

    public function delete_item($id){
        $item = InventoryItem::find(Crypt::decrypt($id));
        if($item->hospital_id == auth()->guard('department')->user()->hospital_id){
            $item->delete();
        }else{
            return redirect()->back();
        }
        return redirect('/department/inventory/dashboard');
    }

    public function edit_item($id){
        $condition = array('Good','Bad','Broken Seal','Returned');
        $category = array('Medicinal','Stationery','Hardware','Others');
        $status = array('In stock','Assigned');
        $shelf_no =  User::where('id', auth()->guard('department')->user()->hospital_id)->first();
        $no = (int)$shelf_no->shelf_number;
        $item = InventoryItem::find(Crypt::decrypt($id));
        if($item->hospital_id == auth()->guard('department')->user()->hospital_id){
            return view('department.inventory.edit-item',['item'=>$item,'no'=>$no,'category' => $category]);
        }else{
            return redirect()->back();
        }
    }

    public function store_edit(Request $request){
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|numeric',
            'shelf_number' => 'required|numeric',
            'item_category' => 'required',
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
            $item->last_edited_by = auth()->guard('department')->user()->name;
            $item->date_brought_in = $request->date_brought_in;
            $item->delivered_by = $request->delivered_by;
            $item->hospital_id = auth()->guard('department')->user()->hospital_id;
            $item->serial_number = $request->serial_number;
            $item->deliverer_number = $request->deliverer_number;
            $item->save();

            return redirect('/department/dashboard');
    }
}
