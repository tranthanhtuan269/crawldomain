<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Domain;
use DataTables;

class DomainController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Domain::select('*')->where('name', 'like', '%.com');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->make(true);
        }
          
        return view('domains');
    }
}
