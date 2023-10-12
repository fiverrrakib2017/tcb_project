<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\Upozila;
use App\Models\Zila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpzilaController extends Controller
{
    public function index(){
        $data= Upozila::with('division','zila')->get();
        $division=Division::all();
        $zila=Zila::all();
        return view('Backend.Pages.Upzila.index',compact('data','division','zila'));
    }
    public function store(Request $request){

        $rules = [
            'division_id' => 'required',
            'zila_id' => 'required',
            'name' => 'required|unique:upozilas',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors()->all())->withInput();
        }

         $object=New Upozila();
         $object->name=$request->name;
         $object->division_id=$request->division_id;
         $object->zila_id=$request->zila_id;
         $object->save();
         return redirect()->back()->with('success','সফল হয়েছে');
    }
    public function delete($id){
        $object=Upozila::find($id);
        $object->delete();
        return redirect()->back()->with('success','মুছে ফেলা সম্পূর্ণ  হয়েছে');
    }
    public function edit($id){
        $division=Division::all();
        $zila=Zila::all();
        $upzila=Upozila::find($id);
        return view('Backend.Pages.Upzila.Update',compact('upzila','division','zila'));

    }
    public function update(Request $request){

        $rules = [
            'name' => 'required|unique:upozilas|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors()->all())->withInput();
        }

         $object=Upozila::find($request->id);
         $object->division_id=$request->division_id;
         $object->zila_id=$request->zila_id;
         $object->name=$request->name;
         $object->update();
         return redirect()->route('admin.upzila.list')->with('success','সফল হয়েছে');
    }

    public function get_upzila($id){
        $data = Upozila::where('zila_id', $id)->get();

        return response()->json($data);
    }
}
