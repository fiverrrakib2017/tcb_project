<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Zila;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class zilaController extends Controller
{
    public function index(){
        $data= Zila::all();
        return view('Backend.Pages.Zila.index',compact('data'));
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
        $data=Zila::find($id);
        return view('Backend.Pages.Zila.Update',compact('data'));

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
         $zila->update();
         return redirect()->route('admin.zila.list')->with('success','সফল হয়েছে');
    }
}
