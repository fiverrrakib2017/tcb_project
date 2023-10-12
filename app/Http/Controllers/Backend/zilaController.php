<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\Zila;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class zilaController extends Controller
{
    public function index(){
        $data= Zila::with('division')->get();
        $division=Division::all();
        return view('Backend.Pages.Zila.index',compact('data','division'));


    }
    public function store(Request $request){


        $rules = [
            'name' => 'required|unique:zilas|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors()->all())->withInput();
        }

         $zila=New Zila();
         $zila->division_id=$request->division_id;
         $zila->name=$request->name;
         $zila->save();
         return redirect()->back()->with('success','সফল হয়েছে');
    }
    public function delete($id){
        $zila=Zila::find($id);
        $zila->delete();
        return redirect()->back()->with('success','মুছে ফেলা সম্পূর্ণ  হয়েছে');
    }
    public function edit($id){
        $zila=Zila::find($id);
        $division=Division::all();

        return view('Backend.Pages.Zila.Update',compact('zila','division'));

    }
    public function update(Request $request){

        $rules = [
            'name' => 'required|unique:zilas|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors()->all())->withInput();
        }

         $zila=Zila::find($request->id);
         $zila->name=$request->name;
         $zila->division_id=$request->division_id;
         $zila->update();
         return redirect()->route('admin.zila.list')->with('success','সফল হয়েছে');
    }





    /*Get Ajax Request and fetch data with response*/
    public function get_zila($division_id){
        $zilas = Zila::where('division_id', $division_id)->get();

        return response()->json($zilas);
    }
}
