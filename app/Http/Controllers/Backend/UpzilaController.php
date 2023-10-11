<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Upozila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpzilaController extends Controller
{
    public function index(){
        $data= Upozila::all();
        return view('Backend.Pages.Upzila.index',compact('data'));
    }
    public function store(Request $request){

        $rules = [
            'name' => 'required|unique:upozilas|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors()->all())->withInput();
        }

         $object=New Upozila();
         $object->name=$request->name;
         $object->save();
         return redirect()->back()->with('success','সফল হয়েছে');
    }
    public function delete($id){
        $object=Upozila::find($id);
        $object->delete();
        return redirect()->back()->with('success','মুছে ফেলা সম্পূর্ণ  হয়েছে');
    }
    public function edit($id){
        $data=Upozila::find($id);
        return view('Backend.Pages.Upzila.Update',compact('data'));

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
         $object->name=$request->name;
         $object->update();
         return redirect()->route('admin.upzila.list')->with('success','সফল হয়েছে');
    }
}
