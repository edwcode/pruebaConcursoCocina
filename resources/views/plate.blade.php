@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registro de platos</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">

                        <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                            <label for="titulo" class="col-md-4 control-label">Titulo</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" required autofocus>

                                @if ($errors->has('titulo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('titulo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('comentario') ? ' has-error' : '' }}">
                            <label for="comentario" class="col-md-4 control-label">Comentario</label>

                            <div class="col-md-6">
                                <textarea id="comentario"class="form-control" name="comentario" cols="6" rows="6" required>
                                    {{ old('comentario') }}
                                </textarea>
                                

                                @if ($errors->has('comentario'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('comentario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
                            <label for="foto" class="col-md-4 contfoto-label">foto</label>

                            <div class="col-md-6">
                                <input type="file" name="foto" class="form-control" required="true">
                                @if ($errors->has('foto'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('foto') }}</strong>
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