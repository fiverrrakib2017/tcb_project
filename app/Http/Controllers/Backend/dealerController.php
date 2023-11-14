<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Dealer;
use App\Models\Division;
use App\Models\Stock;
use App\Models\Union;
use App\Models\Upozila;
use App\Models\Zila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class dealerController extends Controller
{
    public function index(){
        $division=Division::all();
        $dealer=Dealer::all();
        $filter_div=Division::all();
        return view('Backend.Pages.Dealer.index',compact('division','dealer','filter_div'));
    }
    public function store(Request $request){
      
         $rules=[
            'name' => 'required',
            'nid_number' => 'required',
            'zila_id' => 'required',
            'upzila_id' => 'required',
            'union_id' => 'required',
            'mobile' => [
                'regex:/^(01[3-9]{1}\d{8})$/',
                function ($attribute, $value, $fail) {
                    if (!preg_match("/^01[3-9]{1}\d{8}$/", $value)) {
                        $fail('অসম্পূর্ণ বা ভুল মোবাইল নাম্বার।');
                    }
                },
                function ($attribute, $value, $fail) {
                    $exists = Dealer::where('phone_number', $value)->exists();
                    if ($exists) {
                        $fail('এই মোবাইল নাম্বারটি ইতিমধ্যে রেজিস্টার করা হয়েছে।');
                    }
                },
            ],
        ];
       

        $validator = Validator::make($request->all(), $rules);
       
        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors()->all())->withInput();
        }
        
        $object=New Dealer();
        $object->name=$request->name;
        
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
        $dealer=Dealer::with('division','zila','upzila','union')->where(['id'=>$requestID])->first();
        $division=Division::latest()->get();
        return view('Backend.Pages.Dealer.Update',compact('dealer','division'));

    }
    public function delete($id){
         Dealer::find($id)->delete();
         return redirect()->back()->with('success','সফল হয়েছে');
    }
    public function update(Request $request){
        $rules = [
            'name' => 'required',
            'nid_number' => 'required',
            'zila_id' => 'required',
            'upzila_id' => 'required',
            'union_id' => 'required',
            'mobile' => [
                'regex:/^(01[3-9]{1}\d{8})$/',
                function ($attribute, $value, $fail) use ($request) {
                    if (!preg_match("/^01[3-9]{1}\d{8}$/", $value)) {
                        $fail('অসম্পূর্ণ বা ভুল মোবাইল নাম্বার।');
                    }
                },
                function ($attribute, $value, $fail) use ($request) {
                    $exists = Dealer::where('phone_number', $value)
                        ->where('id', '<>', $request->id) // Exclude current record
                        ->exists();

                    if ($exists) {
                        $fail('এই মোবাইল নাম্বারটি ইতিমধ্যে রেজিস্টার করা হয়েছে।');
                    }
                },
            ],

            // 'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors()->all())->withInput();
        }
        // Create a new Dealer  instance and assign values
        $object = Dealer::find($request->id);
        $object->name=$request->name;
        
        $object->phone_number=$request->mobile;
        $object->card_no_start=$request->card_number_start;
        $object->card_no_end=$request->card_number_end;
        $object->nid_no=$request->nid_number;
        $object->division_id=$request->division_id;
        $object->zila_id=$request->zila_id;
       
        $object->upzila_id=$request->upzila_id;
        $object->union_id=$request->union_id;
       
        $object->update();
        return redirect()->route('admin.dealer.list')->with('success','সফল হয়েছে');
    }
    public function get_dealer($id){
       $data = Dealer::where('union_id', $id)->get();

        return response()->json($data);
    }
    public function filterDealers(Request $request){
        $division_id = $request->input('division_id');
        $zila_id = $request->input('zila_id');
        $upzila_id = $request->input('upzila_id');
        $query = Dealer::query(); // Initialize query
    
        if (!empty($division_id)) {
            $query->where('division_id', $division_id);
        }
    
        if (!empty($zila_id)) {
            $query->where('zila_id', $zila_id);
        }
    
        if (!empty($upzila_id)) {
            $query->where('upzila_id', $upzila_id);
        }
    
        $data = $query->with('division', 'zila', 'upzila', 'union')->get();
    
        return response()->json([
            'data' => $data
        ]);
    }
    
}   
