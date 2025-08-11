<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateBankRequest;
use App\Models\Catalogs\Bank;
use App\Models\Catalogs\Company;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 5);
        $page = $request->input('page', 1);
        $page = ($page <= 0) ? 1 : $page;
        $offset = ($page - 1) * $perPage;

        $companies = Company::skip($offset)
        ->take($perPage)
        ->get();

        return response()->json($companies);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $validator = $request->validate(
                [
                    'name' => 'required|max:100|unique:c_banks'
                ],
                [
                    'name.required' => 'El nombre del banco es obligatorio',
                    'name.max' => 'El nombre no puede superar los 100 caracteres',
                    'name.unique' => 'El nombre ya se encuentra registrado'
                ]
            );

            $bank = Bank::create($validator);

            return response()->json($bank);

        } catch(ValidationException $e) {
            return response()->json([
                'error' => $e->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bank $bank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBankRequest $request, Bank $bank)
    {
        try {
            $validator = $request->validated();
            
            $bank->update($validator);

            return response()->json([
                'msg' => 'Banco actualizado correctamente',
                'bank' => $bank
            ]);

        } catch (Exception $e) {
            return response()->json([
                'error' => $e
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bank $bank)
    {
        //
    }
}
