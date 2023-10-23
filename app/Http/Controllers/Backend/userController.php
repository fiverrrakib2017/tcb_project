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
    public function delete($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->back()->with('success','মুছে ফেলা সম্পূর্ণ  হয়েছে');
    }
    
}
