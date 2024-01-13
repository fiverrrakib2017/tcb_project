<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Distribution;
use Illuminate\Http\Request;

class DistributionController extends Controller
{
    public function index()
    {
        return view('Backend.Pages.Distribution.show');
    }
    public function get_all_data(Request $request)
{
    $search = $request->search['value'];
    $selectedMonth = $request->input('selectedMonth');

    $columnsForOrderBy = ['name', 'card_no', 'father_name', 'division', 'zila', 'upozila', 'union', 'village', 'ward_id', 'phone_number', 'created_at'];
    
    $run_query = Distribution::with(['beneficiary', 'division', 'zila', 'upozila', 'union', 'village'])
        ->when($search, function ($query) use ($search) {
            $query->whereHas('beneficiary', function ($subquery) use ($search) {
                $subquery->where('name', 'like', "%$search%")
                    ->orWhere('card_no', 'like', "%$search%")
                    ->orWhere('phone_number', 'like', "%$search%")
                    ->orWhere('nid', 'like', "%$search%");
            });
        })
        ->when($selectedMonth, function ($query) use ($selectedMonth) {
            $query->whereMonth('distribution_date', $selectedMonth);
        })
        ->orderBy($columnsForOrderBy[$request->order[0]['column']], $request->order[0]['dir']);

    $total = $run_query->count();
    $items = $run_query->skip($request->start)->take($request->length)->get();

    $data = [];

    foreach ($items as $item) {
        $data[] = [
            'id' => $item->beneficiary->id,
            'name' => $item->beneficiary->name,
            'card_no' => $item->beneficiary->card_no,
            'nid' => $item->beneficiary->nid,
            'father_name' => $item->beneficiary->father_name,
            'division' => $item->division->name_ban,
            'zila' => $item->zila->name,
            'upozila' => $item->upozila->name,
            'union' => $item->union->name,
            'village' => $item->village->name,
            'ward_id' => $item->ward_id,
            'phone_number' => $item->beneficiary->phone_number,
            'created_at' => $item->created_at,
            'status' => $item->status,
        ];
    }

    return response()->json([
        'draw' => $request->draw,
        'recordsTotal' => $total,
        'recordsFiltered' => $total,
        'data' => $data,
    ]);
}
  
}
