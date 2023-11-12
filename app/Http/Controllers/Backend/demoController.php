<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Beneficiaries;
use Illuminate\Http\Request;

class demoController extends Controller
{
    public function index(){
        $data=Beneficiaries::with('division','zila','upozila','union')->get();
        //return $data;
        return view('Backend.Pages.Beneficiary.index',compact('data'));
    }
}
