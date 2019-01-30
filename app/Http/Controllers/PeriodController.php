<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Period;

class PeriodController extends Controller
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
        if (isset($id)) {
            $this->validate($request, [
                'nombre_concurso' => 'required|max:100',
                'active' => 'required',
                'open_jury' => 'required',
                'open_contestant' => 'required',
            ]);
        }else{
            $this->validate($request, [
                'nombre_concurso' => 'required|unique:Period|max:100',
                'active' => 'required',
                'open_jury' => 'required',
                'open_contestant' => 'required',
            ]);
        }
        $concurso = isset($id) ? Period::find($id) : new Period;
        $concurso->nombre_concurso = $request['nombre_concurso'];
        $concurso->active = $request['active'];
        $concurso->open_jury = $request['open_jury'];
        $concurso->open_contestant = $request['open_contestant'];
        $concurso->save();
        
        return redirect('registerCompetition')->with('success','Concurso Registrado');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $concurso = Period::find($id);
        return view('competition',['concurso'=>$concurso]);
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
