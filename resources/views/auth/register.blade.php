@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registro de usuario</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre de usuario</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('rol') ? ' has-error' : '' }}">
                            <label for="rol" class="col-md-4 control-label">Rol</label>

                            <div class="col-md-6">
 {{ Form::select('rol', App\rol::getComboRols(),null ,['class' => 'form-control', 'required'=>true]) }}
                                @if ($errors->has('rol'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rol') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<div class="form-group{{ $errors->has('period_id') ? ' has-error' : '' }}">
                            <label for="period_id" class="col-md-4 control-label">Concurso</label>

                            <div class="col-md-6">
 {{ Form::select('period_id', App\Period::getComboPeriod(),null ,['class' => 'form-control', 'required'=>true]) }}
                                @if ($errors->has('period_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('period_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table text-center">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                    <header>
                        <tr>
                            <td>Nombre de usuario</td>
                            <td>E-Mail</td>
                            <td>Rol</td>
                            <td>Concurso</td>
                            <td>Password</td>
                            <td>Modificar</td>
                        </tr>
                    </header>
                    <tbody>
                        @foreach (App\User::all() as $user)
                        <tr>
                            <td><input type="text" name="nameNew" id="nameNew{{ $user->id }}" value="{{ $user->name }}" class="form-control"></td>
                            <td><input id="emailNew{{ $user->id }}" type="emailNew" class="form-control" name="emailNew" value="{{ $user->email }}" disabled="true"></td>
                            <td>{{ Form::select('rolNew', App\rol::getComboRols(), $user->rols_id,['class' => 'form-control', 'required'=>true,'id'=>'rolNew'.$user->id]) }}</td>
                            <td>{{ Form::select('period_idNew', App\Period::getComboPeriod(),$user->period_id ,['class' => 'form-control', 'required'=>true,'id'=>'period_id'.$user->id]) }}</td>
                            <td>
                                <input id="passwordNew{{ $user->id }}" type="password" class="form-control" name="passwordNew" placeholder="password">
                                <input id="password-confirmNew{{ $user->id }}" type="password" class="form-control" name="password-confirmNew" placeholder="Confirmar Password">
                                <input type="hidden" name="id{{ $user->id }}" value="{{ $user->id }}">
                            </td>
                            <td><button  class="btn btn-default updateUser" value="{{ $user->id }}">Modificar</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
