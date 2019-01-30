<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plate;
use App\Vote;
use Illuminate\Support\Facades\Validator;
class VoteController extends Controller
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
    public function store(Request $request,$id=null)
    {
        $validator = Validator::make($request->all(), [
            'sabor' => 'required|numeric',
            'imagen' => 'required|numeric',
            'elaboracion' => 'required|numeric',
            
        ], [
            'required' => ':attribute es requerido.',
            'numeric' => ':attribute debe ser numerico.',
         ]);

        if ($validator->fails()) {
            return redirect('registerUser')->withErrors($validator)->withInput();
        }else{
            $vote = new Vote;
            $vote->sabor = $request['sabor'];
            $vote->imagen = $request['imagen'];
            $vote->elaboracion = $request['elaboracion'];
            $vote->users_id = $request['id_user'];
            $vote->platos_id = $id;
            $vote->save();
            return redirect('vote')->with('success','Valoracion Registrada');
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
        $plate = Plate::find($id);
        return view('evaluate',['plate'=>$plate]);
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
