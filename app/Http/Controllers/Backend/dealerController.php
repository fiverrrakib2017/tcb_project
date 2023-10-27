<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Dealer;
use App\Models\Division;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class dealerController extends Controller
{
    public function index(){
        $division=Division::all();
        $dealer=Dealer::all();
        return view('Backend.Pages.Dealer.index',compact('division','dealer'));
    }
    public function store(Request $request){
      
         $rules=[
            'name' => 'required',
            'username' => 'required',
            'nid_number' => 'required',
            'zila_id' => 'required',
            'upzila_id' => 'required',
            'union_id' => 'required',
        ];
       

        $validator = Validator::make($request->all(), $rules);
       
        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors()->all())->withInput();
        }
        
        $object=New Dealer();
        $object->name=$request->name;
        
        $object->username=$request->username;
        $object->phone_number=$request->mobile;
        $object->card_no_start=$request->card_number_start;
        $object->card_no_end=$request->card_number_end;
        $object->nid_no=$request->nid_number;
        $object->division_id=$request->division_id;
        $object->zila_id=$request->zila_id;
       
        $object->upzila_id=$request->upzila_id;
        $object->union_id=$request->union_id;
       
        $object->save();
        return redirect()->back()->with('success','সফল হয়েছে');
    }
    public function edit($requestID){
        return $requestID;
        exit;
    }
}
