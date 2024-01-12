<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Distribution;
use Illuminate\Http\Request;

class DistributionController extends Controller
{
    public function index(){
        return view('Backend.Pages.Distribution.show');
    }
    public function get_all_data(Request $request)
{
    $query = Distribution::with('beneficiary', 'division', 'zila', 'upozila', 'union', 'village');

    // Handle search
    if ($request->has('search')) {
        $query->whereHas('beneficiary', function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->search['value'] . '%');
        });
        $query->whereHas('beneficiary', function ($query) use ($request) {
            $query->where('card_no', 'like', '%' . $request->search['value'] . '%');
        });
    }

    // Get total records without filtering
    $total = $query->count();

    // Apply sorting and pagination
    $query->orderBy($request->columns[$request->order[0]['column']]['data'], $request->order[0]['dir']);
    $data = $query->skip($request->start)->take($request->length)->get();

    // Transform data as needed (e.g., format dates)

    return response()->json([
        'draw' => $request->draw,
        'recordsTotal' => $total,
        'recordsFiltered' => $total,
        'data' => $data,
    ]);
}
    
}
