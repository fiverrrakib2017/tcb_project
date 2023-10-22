<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\Stock;
use Illuminate\Support\Facades\Validator;

class StockController extends Controller
{
    public function index(){
        $division=Division::all();
        $stocks=Stock::all();
        return view('Backend.Pages.Stock.index',compact('division','stocks'));
    }
    public function store(Request $request){
        $rules=[
            'division_id' => 'required',
            'zila_id' => 'required',
            'upzila_id' => 'required',
            'union_id' => 'required',
            'ward_id' => 'required',
            'month' => 'required',
            'year' => 'required',
            'amount' => 'required',
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
        $object->dealer_id='1';
        $object->status='1';
        $object->save();
        return redirect()->back()->with('success','সফল হয়েছে');
    }
}
