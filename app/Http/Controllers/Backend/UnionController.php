<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Union;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnionController extends Controller
{
    public function index(){
        $data= Union::all();
        return view('Backend.Pages.Union.index',compact('data'));
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
        $data=Union::find($id);
        return view('Backend.Pages.Union.Update',compact('data'));

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
         $object->name=$request->name;
         $object->update();
         return redirect()->route('admin.union.list')->with('success','সফল হয়েছে');
    }
}
