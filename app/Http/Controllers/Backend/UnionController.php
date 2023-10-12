<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Union;
use App\Models\Upozila;
use App\Models\Division;
use App\Models\Zila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnionController extends Controller
{
    public function index(){
        $union= Union::with('division','zila','upzila',)->get();
        $division=Division::all();  $zila=Zila::all();   $upzila= Upozila::all();

        return view('Backend.Pages.Union.index',compact('union','division','zila','upzila'));
    }
    public function store(Request $request){


        $rules = [
            'name' => 'required|unique:unions|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors()->all())->withInput();
        }

         $object=New Union();
         $object->division_id=$request->division_id;
         $object->zila_id=$request->zila_id;
         $object->upozila_id=$request->upzila_id;
         $object->name=$request->name;
         $object->save();
         return redirect()->back()->with('success','সফল হয়েছে');
    }
    public function delete($id){
        $object=Union::find($id);
        $object->delete();
        return redirect()->back()->with('success','মুছে ফেলা সম্পূর্ণ  হয়েছে');
    }
    public function edit($id){
        $union=Union::find($id);
        $division=Division::all();  $zila=Zila::all();   $upzila= Upozila::all();
        return view('Backend.Pages.Union.Update',compact('union','division','zila','upzila'));

    }
    public function update(Request $request){
        $rules = [
            'name' => 'required|unique:unions|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors()->all())->withInput();
        }

         $object=Union::find($request->id);
         $object->division_id=$request->division_id;
         $object->zila_id=$request->zila_id;
         $object->upozila_id=$request->upzila_id;
         $object->name=$request->name;
         $object->update();
         return redirect()->route('admin.union.list')->with('success','সফল হয়েছে');
    }
}
