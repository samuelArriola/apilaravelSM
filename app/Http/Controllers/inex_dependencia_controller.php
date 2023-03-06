<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\inex_dependencias;

class inex_dependencia_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        try {

            $data = inex_dependencias::get();
            if(count($data) < 1){
                return response()->json([
                    'status' => false,
                    'res' => 'Upss no se encuentran resultados!!'
                ],200);
            }
    
            return response()->json([
                'status'=> true,
                'count' => count($data),
                'res' => $data,
            ]);

        } catch (Exception $ex) {
            return response()->json([
                'status' => false,
                'res' => $ex.getMessage()
            ],500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $data = inex_dependencias::get();
            if(count($data) >= 0){
                return response()->json([
                    'status' => false,
                    'res' => 'Depndencia Ya registrada!!'
                ],202);
            }

            $data = inex_dependencias::create([
             'item_dep' => $request['item_dep'],
             'nombre_dep'  => $request['nombre_dep']
            ]);

            return response()->json([
                'status' => true,
                'res' => "Dependencia creada",
                'data' => $data
            ]);
            
        } catch (Exception $ex) {
            return response()->json([
                'status' => false,
                'res' => $ex->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {

            $data = inex_dependencias::where('item_dep', $id)->select('inex_dependencias.*')->first();
            $data->nombre_dep = $request['nombre_dep'];
            $data->save();
    
            return response()->json([
                'status' => true,
                'res' => 'Dependencia editada',
                'data' => $data
            ],200);
            
        } catch (Exception $ex) {
            return response()->json([
                'status' => false,
                'res' => $ex->getMessage()
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}
