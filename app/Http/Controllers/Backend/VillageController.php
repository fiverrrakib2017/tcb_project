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
    public function get_village($id){
        $data = Village::where('union_id', $id)->get();

        return response()->json($data);
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
    public function edit($id){
        $village=Village::find($id);
        $division=Division::all();  
        $zila=Zila::all();   
        $upzila= Upozila::all();
        $union= Union::all();
        return view('Backend.Pages.Village.Update',compact('division','zila','upzila','union','village'));
    }
    public function update(Request $request){
        $rules = [
            'name' => 'required|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors()->all())->withInput();
        }

         $object=Village::find($request->id);
        $object->division_id=$request->division_id;

         $object->zila_id=$request->zila_id;
         $object->upozila_id=$request->upzila_id;
         $object->union_id=$request->union_id;
         $object->name=$request->name;
         $object->update();
         return redirect()->route('admin.village.list')->with('success','সফল হয়েছে');
    }
    public function delete($id){
        $object=Village::find($id);
        $object->delete();
        return redirect()->back()->with('success','মুছে ফেলা সম্পূর্ণ  হয়েছে');
    }
    public function filter_village(Request $request){
        $division_id = $request->input('division_id');
        $zila_id = $request->input('zila_id');
        $upzila_id = $request->input('upzila_id');
        $union_id = $request->input('union_id');
        $query = Village::query(); // Initialize query
    
        if (!empty($division_id)) {
            $query->where('division_id', $division_id);
        }
    
        if (!empty($zila_id)) {
            $query->where('zila_id', $zila_id);
        }
    
        if (!empty($upzila_id)) {
            $query->where('upozila_id', $upzila_id);
        }
        if (!empty($union_id)) {
            $query->where('union_id', $union_id);
        }
    
        $data = $query->with('division', 'zila', 'upzila','union')->get();
    
        return response()->json([
            'data' => $data
        ]);
    }
}
