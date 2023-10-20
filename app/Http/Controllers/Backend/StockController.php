<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;

class StockController extends Controller
{
    public function index(){
        $division=Division::all();
        return view('Backend.Pages.Stock.index',compact('division'));
    }
    public function store(Request $request){
        return $request->all();
    }
}
