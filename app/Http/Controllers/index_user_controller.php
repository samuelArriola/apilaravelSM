<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\inex_usuarios;


class index_user_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        try {
           
            $res = inex_usuarios::get();

            
            if(count($res) < 1){
                return response()->json([
                    'registro'=> count($res),
                    'status'=> true,
                    'res'=> $res,
                    'mensaje'=> 'Ups, aún no hay datos'
                ]); 
            }else {
                return response()->json([
                    'registro'=> count($res),
                    'status'=> true,
                    'res'=> $res
                ],200);
            }

        } catch (Exception $ex) {
            return response()->json([
                'status'=> false,
                'res'=> $ex->getMessage()
            ],500);
        }
    }

   
    public function create(): Responsex
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       try {

        $user = inex_usuarios::where('iden_usua', '=', $request['iden_usua'] )->first();
        
        if(isset($user->iden_usua)){
            return response()->json([
                'status' => false,
                'res' => 'Usuario ya resgistrado'
            ]);

        }

        $save = inex_usuarios::create([
        'iden_usua' => $request['iden_usua'], 
        'nomb_usua' => $request['nomb_usua'],
        'apel_usua' => $request['apel_usua'],
        'correo' => $request['correo'],
        'role_usua' => $request['role_usua'],
        'item_dep' => $request['item_dep'],
        'estado' => $request['estado']
        ]);

        return response()->json([
            'status'=> true,
            'mensage' => 'Usuario creado',
            'res'=> $save
        ],200);


       } catch (Exception $ex) {
            return response()->json([
                'status'=> false,
                'res'=> $ex->getMessage()
            ],500);
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
    public function edit(string $id)
    {
        try {
           $data = inex_usuarios::where('iden_usua',$id)->first();

           return response()->json([
            'status'=> true,
            'mensage' => 'Usuario obtenido',
            'res'=> $data
          ],200);

        } catch (Exception $ex) {
            return response()->json([
                'status'=> false,
                'res'=> $ex->getMessage()
            ],500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            
            $data = inex_usuarios::where('iden_usua',$id)->first();

            $data->iden_usua = $request['iden_usua'];
            $data->nomb_usua = $request['nomb_usua'];
            $data->apel_usua = $request['apel_usua'];
            $data->correo = $request['correo'];
            $data->role_usua = $request['role_usua'];
            $data->item_dep = $request['item_dep'];
            $data->estado = $request['estado'];

            $data->save();

            return response()->json([
                'status'=> true,
                'mensage' => 'Usuario guardado exitosamente',
            ]);

        } catch (Exception $ex) {
            return response()->json([
                'status'=> false,
                'res'=> $ex->getMessage()
            ],500);
        }    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $dataGet = inex_usuarios::where('iden_usua',$id)->first();
            if(!isset($dataGet->iden_usua)){
                return response()->json([
                    'status'=> false,
                    'res'=>"El usuario {$id} no existe"
                ]);
            }

            $data = inex_usuarios::where('iden_usua',$id);
            $data->delete(); //lo hao asi porque no estoy eliminado por llave primaria
            

            return response()->json([
                'status' => true,
                'res' => "Usuario {$id} eliminado",
                'data' => $data
            ]);
            
        } catch (Exception $ex) {
             return response()->json([
                'status' => false,
                'res' => $ex.getMessage()
             ]);
        }
    }
}
                                                                        