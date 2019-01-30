<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Plate;
use Illuminate\Contracts\Auth\Factory as Auth;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:255',
            'comentario' => 'required|string|max:255',
            'foto' => 'required',
        ], [
            'required' => ':attribute es requerido.',
            'numeric' => ':attribute debe ser numerico.',
         ]);

        if ($validator->fails()) {
            return redirect('plate')->withErrors($validator)->withInput();
        }else{
            if(isset($request->foto) && $request->foto != ''){
                    
                $ext = $request['foto']->extension();
                $request['foto']->move(public_path("/assets/files/fotos"), date('YmdHis').'_'.$request['id_user'].'.'.$ext);
                    $plato = new Plate;
                    $plato->titulo = $request['titulo'];
                    $plato->comentario = $request['comentario'];
                    $plato->users_id = $request['id_user'];
                    $plato->foto = date('YmdHis').'_'.$request['id_user'].'.'.$ext;
                    $plato->save();      
                    
                }
            
            return redirect('plate')->with('success','Plato Registrado');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
