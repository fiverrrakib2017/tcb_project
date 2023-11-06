<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\Union;
use App\Models\Upozila;
use App\Models\Village;
use App\Models\Zila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VillageController extends Controller
{
    public function index(){
        $village= Village::with('division','zila','upzila','union')->get();
        $division=Division::all();
        $filter_div=Division::all();
        $zila=Zila::all();
        $upzila= Upozila::all();
        $union= Union::all();
        

        return view('Backend.Pages.Village.index',compact('division','zila','upzila','union','village','filter_div'));
    }
    public function store(Request $request){

        $rules = [
            'name' => 'required|unique:unions|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors()->all())->withInput();
        }

         $object=New Village();
         $object->division_id=$request->division_id;
         $object->zila_id=$request->zila_id;
         $object->upozila_id=$request->upzila_id;
         $object->union_id=$request->union_id;
         $object->name=$request->name;
         $object->save();
         return redirect()->back()->with('success','সফল হয়েছে');
    }
}
