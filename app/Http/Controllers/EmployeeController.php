<?php

namespace App\Http\Controllers;


use App\Models\Artist;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
        public function getAll(Request $request)
    {
        $search = $request->search;
        $hidden = ['created_at', 'updated_at', 'start_date'];

        if ($search) {
            return response()->json([
                'message' => 'Employee returned.',
                'data' => Employee::where('name', 'LIKE', "%$search%")->get()->makehidden($hidden),
            ]);
        }

        return response()->json([
            'message' => 'Employee returned.',
            'data' => Employee::all()->makeHidden($hidden),
        ]);

    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100|string',
            'age' => 'required|integer',
            'start_date' => 'date',
            'contract_id' => 'required|integer|exists:contracts,id'
        ]);

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->age = $request->age;
        $employee->start_date = $request->start_date;
        $employee->contract_id = $request->contract_id;

        if (! $employee->save()){
            return response()->json([
                'message'=> 'Ooops! Employee did not save'
            ], 500);
        }
        return response()->json([
            'message' => 'Hurray, employee has been created.'
        ], 201);
    }



}
