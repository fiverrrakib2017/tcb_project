<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Dealer;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\Stock;
use App\Models\Union;
use App\Models\Upozila;
use App\Models\Zila;
use Illuminate\Support\Facades\Validator;

class StockController extends Controller
{
    public function index(){
         $stocks=Stock::all();
        $division=Division::all();
         return view('Backend.Pages.Stock.index',compact('division','stocks'));
    }
    public function store(Request $request){
       
        $rules=[
            'division_id' => 'required',
            'zila_id' => 'required',
            'upzila_id' => 'required',
            'union_id' => 'required',
            'month' => 'required',
            'year' => 'required',
            'amount' => 'required',
            'dealer_id' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors()->all())->withInput();
        }
        $object=New Stock();
        $object->division_id=$request->division_id;
        $object->zila_id=$request->zila_id;
        $object->upzila_id=$request->upzila_id;
        $object->union_id=$request->union_id;
        //$object->ward_id=$request->ward_id;
        $object->month=$request->month;
        $object->year=$request->year;
        $object->amount=$request->amount;
        $object->dealer_id=$request->dealer_id;
        $object->status='1';
        $object->save();
        return redirect()->back()->with('success','সফল হয়েছে');
    }
    public function edit($id){
        $division=Division::all();
        $zila=Zila::all();
        $upzila=Upozila::all();
        $union=Union::all();
        $stocks=Stock::find($id);
        $dealer=Dealer::all();
        return view('Backend.Pages.Stock.Update',compact('division','stocks','zila','upzila','union','dealer'));
    }
    public function delete($id){
        $object=Stock::find($id);
        $object->delete();
        return redirect()->back()->with('success','মুছে ফেলা সম্পূর্ণ  হয়েছে');
    }
    public function update(Request $request){
        
        $rules=[
            'division_id' =>'required',
            'zila_id' => 'required',
            'upzila_id' => 'required',
            'union_id' => 'required',
            'month' => 'required',
            'year' => 'required',
            'amount' => 'required',
            'dealer_id' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors()->all())->withInput();
        }

        $object=Stock::find($request->id);
        $object->division_id=$request->division_id;
         $object->zila_id=$request->zila_id;
         $object->upzila_id=$request->upzila_id;
         $object->union_id=$request->union_id; 
         $object->dealer_id=$request->dealer_id;
         //$object->ward_id=$request->ward_id;
         $object->month=$request->month;
         $object->year=$request->year;
         $object->amount=$request->amount;
        
         $object->update();
         return redirect()->route('admin.stock.list')->with('success','সফল হয়েছে');
    }
}
