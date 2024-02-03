<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MachineLog;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ShowMachineLogsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $logs = MachineLog::all();
        return DataTables::of($logs)
            ->addIndexColumn()
            ->make(true);
    }
}
