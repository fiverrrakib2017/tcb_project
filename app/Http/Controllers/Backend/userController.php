<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index(){
        $division=Division::all();
        return view('Backend.Pages.User.index',compact('division'));
    }
}
