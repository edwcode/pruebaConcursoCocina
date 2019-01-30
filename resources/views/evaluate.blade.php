@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">votaciones</div>

                <div class="panel-body">
                    
                    <form class="form-horizontal" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('concursante') ? ' has-error' : '' }}">
                            <label for="sabor" class="col-md-4 control-label">Concursante</label>

                            <div class="col-md-6">
                                <label class="form-control">{{ $plate->InversaPlateUser->name }}</label>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                            <label for="sabor" class="col-md-4 control-label">Titulo</label>

                            <div class="col-md-6">
                                <label class="form-control">{{ $plate->titulo }}</label>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('comentario') ? ' has-error' : '' }}">
                            <label for="sabor" class="col-md-4 control-label">Comentario</label>
                            <div class="col-md-6">
                            <textarea class="form-control" disabled="true">{{ $plate->comentario }}</textarea>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
                            <label for="sabor" class="col-md-4 control-label">Foto</label>
                            <div class="col-md-6">
                            <img src="{{ asset('assets/files/fotos/'.$plate->foto ) }}" width="100px">
                            </div>
                        </div>
<input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                        <div class="form-group{{ $errors->has('sabor') ? ' has-error' : '' }}">
                            <label for="sabor" class="col-md-4 control-label">Sabor</label>

                            <div class="col-md-6">
 {{ Form::select('sabor', [''=>'valoracion por Sabor',0=>0,1=>1,2=>2,3=>3,4=>4,5=>5],null ,['class' => 'form-control', 'required'=>true]) }}
                                @if ($errors->has('sabor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sabor') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('imagen') ? ' has-error' : '' }}">
                            <label for="imagen" class="col-md-4 control-label">imagen</label>

                            <div class="col-md-6">
 {{ Form::select('imagen', [''=>'valoracion por Imagen',0=>0,1=>1,2=>2,3=>3,4=>4,5=>5],null ,['class' => 'form-control', 'required'=>true]) }}
                                @if ($errors->has('imagen'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('imagen') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('elaboracion') ? ' has-error' : '' }}">
                            <label for="elaboracion" class="col-md-4 control-label">elaboracion</label>

                            <div class="col-md-6">
 {{ Form::select('elaboracion', [''=>'valoracion por Elaboracion',0=>0,1=>1,2=>2,3=>3,4=>4,5=>5],null ,['class' => 'form-control', 'required'=>true]) }}
                                @if ($errors->has('elaboracion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('elaboracion') }}</strong>
                                    </span>
                                @endif
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
            </div>
        </div>
    </div>
</div>
@endsection