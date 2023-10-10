<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index(){
        $data=Division::all();
        return view('Backend.Pages.Division.index',compact('data'));
    }
}
