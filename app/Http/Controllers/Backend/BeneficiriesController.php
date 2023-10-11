<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Beneficiaries;
use App\Models\Division;
use App\Models\Union;
use App\Models\Upozila;
use App\Models\Ward;
use App\Models\Zila;
use Illuminate\Http\Request;

class BeneficiriesController extends Controller
{
    public function index(){
        $data=Beneficiaries::all();
        return view('Backend.Pages.Beneficiary.index',compact('data'));
    }
    public function add(){
        $division=Division::all();
        $zila=Zila::all();
        $upzila=Upozila::all();
        $union=Union::all();
        return view('Backend.Pages.Beneficiary.add',compact('division','zila','upzila','union'));
    }
    public function store(Request $request){
        $request->validate([
            'card_no' => 'required',
            'nid' => 'required',
            'name' => 'required',
            'fh_name' => 'required',
            'mother_name' => 'required',
            'division_id' => 'required',
            'zila_id' => 'required',
            'upzila_id' => 'required',
            'union_id' => 'required',
            'ward_id' => 'required',
            'village' => 'required',
            'mobile' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }else{
            $imageName ="121232.png";
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
        $beneficiary->ward_id = $request->ward_id;
        $beneficiary->village_name = $request->village;
        $beneficiary->phone_number = $request->mobile;
        $beneficiary->photo = $imageName; // Assuming you have a 'photo' column in your table
        $beneficiary->status = '0';

        // Save the beneficiary to the database
        $beneficiary->save();

        return redirect()->back()->with('success','উপকারভোগী তথ্য যুক্ত হয়েছে');
    }
}
