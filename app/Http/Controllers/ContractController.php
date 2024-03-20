<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Employee;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function getAll(Request $request)
    {
        $search = $request->search;
        $hidden = ['created_at', 'updated_at'];

        if ($search) {
            return response()->json([
                'message' => 'Contract returned.',
                'data' => Contract::where('name', 'LIKE', "%$search%")->get()->makehidden($hidden),
            ]);
        }

        return response()->json([
            'message' => 'Employee returned.',
            'data' => Employee::with('contract')->get()->makeHidden($hidden),
        ]);

    }

    public function find(int $id)
    {
        return response()->json([
            'message' => 'Contract returned',
            'data' => Contract::with('employees:name,contract_id')->find($id)
        ], 201);

    }
}
