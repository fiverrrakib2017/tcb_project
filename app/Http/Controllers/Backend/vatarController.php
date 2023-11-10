<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Vatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class vatarController extends Controller
{
    public function index(){
        $vatar=Vatar::all();
        return view('Backend.Pages.Vatar.index',compact('vatar'));
    }
    public function store(Request $request){
        $rules = [
            'name' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors()->all())->withInput();
        }

         $object=New Vatar();
         $object->name=$request->name;
         $object->save();
         return redirect()->back()->with('success','সফল হয়েছে');
    }
    public function edit($id){
        $vatar=Vatar::find($id);
        return view('Backend.Pages.Vatar.Update',compact('vatar'));
    }
    public function update(Request $request){
        $rules = [
            'name' => 'required|unique:unions|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors()->all())->withInput();
        }

         $object=Vatar::find($request->id);
         $object->name=$request->name;
         $object->update();
         return redirect()->route('admin.vatar.list')->with('success','সফল হয়েছে');
    }
    public function delete($id){
        $object=Vatar::find($id);
        $object->delete();
        return redirect()->route('admin.vatar.list')->with('success','মুছে ফেলা সম্পূর্ণ  হয়েছে');
    }
}
