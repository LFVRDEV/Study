<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 10);
        $page = $request->query('page', 1);
        $page = ($page <= 0) ?  0 : $page;
        $offset = ($page - 1) * $perPage;

        $request = Employee::skip($offset)
        ->take($perPage)
        ->select('id', 'name', 'p_surname', 'm_surname', 'phone_p', 'email_p', 'phone_ent', 'email_ent',
        DB::raw(
            "
            CASE
                WHEN status = 0 THEN 'BAJA'
                WHEN status = 1 THEN 'ALTA'
                WHEN status = 2 THEN 'REINGRESO'
                ELSE 'N/D'
            END as status
            "
        ))
        ->get();
        return $request;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validation = $request->validated();
            
            $employee = Employee::create($validation);

            return response()->json([
                'msg' => 'Colaborador registrado correctamente.'
            ]);

        } catch(Exception $e) {
            return response()->json(['error' => $e], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
