<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\rol;

class UserController extends Controller
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'rol'=>'required',
            'period_id' => 'required',
        ], [
            'required' => ':attribute es requerido.',
            'numeric' => ':attribute debe ser numerico.',
         ]);

        if ($validator->fails()) {
            return redirect('registerUser')->withErrors($validator)->withInput();
        }else{

            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
                'rols_id' => $request['rol'],
                'period_id' => $request['period_id'],
            ]);
            return redirect('registerUser')->with('success','Medidor Registrado');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeAjax(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            //'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'rol'=>'required',
            'period_id' => 'required',
        ],[
            'required' => ':attribute es requerido.',
            'numeric' => ':attribute debe ser numerico.',
         ]);

        $userUpdtae = User::find($request['id']);
        $userUpdtae->name = $request['name'];
        $userUpdtae->password = bcrypt($request['password']);
        $userUpdtae->rols_id = $request['rol'];
        $userUpdtae->period_id = $request['period_id'];
        $userUpdtae->save();
        return response()->Json('Usuario actualizado !!');
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
