<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Beneficiaries;
use App\Models\Dealer;
use App\Models\Distribution;
use App\Models\Division;
use App\Models\Union;
use App\Models\Upozila;
use App\Models\Vatar;
use App\Models\Village;
use App\Models\Ward;
use App\Models\Zila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BeneficiriesController extends Controller
{
    public function index(){
        $data=Beneficiaries::with('division','zila','upozila','union')->get();
        // return $data;exit;
        return view('Backend.Pages.Beneficiary.show',compact('data'));
    }
    public function add(){
        $division=Division::all();
        $vatar=Vatar::all();
        $dealer=Dealer::all();
        return view('Backend.Pages.Beneficiary.add',compact('division','vatar','dealer'));
    }
    public function store(Request $request){
        $rules = [
            'card_no' => 'required|unique:beneficiaries,card_no',
            'nid' => 'required',
            'name' => 'required',
            'fh_name' => 'required',
            'mother_name' => 'required',
            'division_id' => 'required',
            'zila_id' => 'required',
            'upzila_id' => 'required',
            'union_id' => 'required',
            'dealer_id' => 'required',
            'vatar_id' => 'required',
            'ward_id' => 'required',
            'village_id' => 'required',
            'mobile' => [
                'regex:/^(01[3-9]{1}\d{8})$/',
                function ($attribute, $value, $fail) {
                    if (!preg_match("/^01[3-9]{1}\d{8}$/", $value)) {
                        $fail('অসম্পূর্ণ বা ভুল মোবাইল নাম্বার।');
                    }
                },
                function ($attribute, $value, $fail) {
                    $exists = Beneficiaries::where('phone_number', $value)->exists();
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

        // Create a new Beneficiary instance and assign values
        $beneficiary = new Beneficiaries();
        $beneficiary->card_no = $request->card_no;
        $beneficiary->nid = $request->nid;
        $beneficiary->name = $request->name;
        $beneficiary->father_name = $request->fh_name;
        $beneficiary->mother_name = $request->mother_name;
        $beneficiary->division_id = $request->division_id;
        $beneficiary->zila_id = $request->zila_id;
        $beneficiary->upozila_id = $request->upzila_id;
        $beneficiary->union_id = $request->union_id;
        $beneficiary->dealer_id = $request->dealer_id;
        $beneficiary->vatar_id = $request->vatar_id;
        $beneficiary->ward_id = $request->ward_id;
        $beneficiary->village_id = $request->village_id;
        $beneficiary->phone_number = $request->mobile;
        // $beneficiary->photo = $imageName; 
        $beneficiary->status = '0';

        // Save the beneficiary to the database
        $beneficiary->save();

        $distributionArray = [
            'beneficiary_id' => $beneficiary->id,
            'status' => 0,
            'distribution_date' =>date('Y-m-d'),
            'division_id' =>$request->division_id,
            'zila_id' =>$request->zila_id,
            'upozila_id' =>$request->upzila_id,
            'union_id' =>$request->union_id,
            'village_id' =>$request->village_id,
            'ward_id' => $request->ward_id,
        ];
        Distribution::insert($distributionArray);

        return redirect()->back()->with('success','উপকারভোগী তথ্য যুক্ত হয়েছে');
    }
    public function edit($id){
        $item =Beneficiaries::find($id);
        $division=Division::all();
        $vatar=Vatar::all();
        $dealer=Dealer::all();
        return view('Backend.Pages.Beneficiary.Update',compact('item','division','vatar'));

       $item=Beneficiaries::with('division','zila','upzila','union','village')->where(['id'=>$id])->first();
       return $item; exit;
       $division=Division::latest()->get();
       $vatar=Vatar::latest()->get();
        $dealer=Dealer::latest()->get();
       return view('Backend.Pages.Beneficiary.Update',compact('item','dealer','division','vatar','dealer'));


    }
    public function update(Request $request){
        $rules = [
           
            'card_no' => 'required|unique:beneficiaries,card_no,'.$request->id,
            'nid' => 'required',
            'name' => 'required',
            'fh_name' => 'required',
            'mother_name' => 'required',
            'division_id' => 'required',
            'zila_id' => 'required',
            'upzila_id' => 'required',
            'union_id' => 'required',
            'ward_id' => 'required',
            'village_id' => 'required',
            'mobile' => [
                'regex:/^(01[3-9]{1}\d{8})$/',
                function ($attribute, $value, $fail) use ($request) {
                    if (!preg_match("/^01[3-9]{1}\d{8}$/", $value)) {
                        $fail('অসম্পূর্ণ বা ভুল মোবাইল নাম্বার।');
                    }
                },
                function ($attribute, $value, $fail) use ($request) {
                    $exists = Beneficiaries::where('phone_number', $value)
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
        

        // Create a new Beneficiary instance and assign values
        $beneficiary = Beneficiaries::find($request->id);
        $beneficiary->card_no = $request->card_no;
        $beneficiary->nid = $request->nid;
        $beneficiary->name = $request->name;
        $beneficiary->father_name = $request->fh_name;
        $beneficiary->mother_name = $request->mother_name;
        $beneficiary->division_id = $request->division_id;
        $beneficiary->zila_id = $request->zila_id;
        $beneficiary->upozila_id = $request->upzila_id;
        $beneficiary->union_id = $request->union_id;
        $beneficiary->vatar_id = $request->vatar_id;
        $beneficiary->ward_id = $request->ward_id;
        $beneficiary->village_id = $request->village_id;
        $beneficiary->phone_number = $request->mobile;
        // $beneficiary->photo = $imageName;
        $beneficiary->status = '0';

        // Save the beneficiary to the database
        $beneficiary->update();

        return redirect()->route('admin.beneficiries.list')->with('success','উপকারভোগী তথ্য পরিবর্তন হয়েছে');
    }
    public function delete($id){
        $beneficiary = Beneficiaries::find($id);
        $beneficiary->delete();
        return redirect()->back()->with('success','মুছে ফেলা সম্পূর্ণ  হয়েছে');
    }

}
