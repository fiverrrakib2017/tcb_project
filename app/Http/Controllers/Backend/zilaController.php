<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Zila;
use Illuminate\Http\Request;

class zilaController extends Controller
{
    public function index(){
        $data=Zila::all();
        return view('Backend.Pages.Zila.index',compact('data'));
    }
}
