<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Machine;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ShowMachineController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $machine = Machine::select('id', 'user_id', 'lat', 'lng')
            -> with('user:id,name') -> get();
        return DataTables::of($machine)
            ->addIndexColumn()
            ->addColumn('action', function ($d) {
                return '<a href="'.route('show-edit-machine', ["machine" => $d -> id]).'" id='. $d -> id.'style="cursor:pointer;" class="btn btn-xs btn-outline-warning editKomponen"><i class="fa fa-pencil"></i> </a>
                         <a href="'.route('delete-machine-data', ["machine" => $d -> id]).'" style="cursor:pointer;" id='.$d -> id.' class="btn btn-xs btn-outline-danger hapusKomponen"><i class="fa fa-trash"></i> </a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
