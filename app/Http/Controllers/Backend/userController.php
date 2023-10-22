<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index(){
        $division=Division::all();
        $users=User::all();
        return view('Backend.Pages.User.index',compact('division','users'));
    }
}
