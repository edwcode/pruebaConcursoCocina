@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registro de concurso</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST">
                        {{ csrf_field() }}
                        @if (isset($concurso))
                        	<input type="hidden" name="id" value="{{ $concurso->id }}">	
                        @endif
                        
                        <div class="form-group{{ $errors->has('nombre_concurso') ? ' has-error' : '' }}">
                            <label for="nombre_concurso" class="col-md-4 control-label">Nombre de consurso</label>

                            <div class="col-md-6">
                                <input id="nombre_concurso" type="text" class="form-control" name="nombre_concurso" value="{{ old('nombre_concurso') }}@isset ($concurso){{$concurso->nombre_concurso}} @endisset" required autofocus>

                                @if ($errors->has('nombre_concurso'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre_concurso') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                            <label for="active" class="col-md-4 control-label">Activo</label>

                            <div class="col-md-6">
@if (isset($concurso))
	{{ Form::select('active', ['1'=>'si','0'=>'no'],$concurso->active,['class' => 'form-control', 'required'=>true]) }}
@else
	 {{ Form::select('active', ['1'=>'si','0'=>'no'],null,['class' => 'form-control', 'required'=>true]) }}
@endif

                                @if ($errors->has('active'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('active') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('open_jury') ? ' has-error' : '' }}">
                            <label for="open_jury" class="col-md-4 control-label">Abierto para jurado</label>

                            <div class="col-md-6">
@if (isset($concurso))
	{{ Form::select('open_jury', ['1'=>'si','0'=>'no'],$concurso->open_jury ,['class' => 'form-control', 'required'=>true]) }}
@else
	{{ Form::select('open_jury', ['1'=>'si','0'=>'no'],null ,['class' => 'form-control', 'required'=>true]) }}
@endif
 
                                @if ($errors->has('open_jury'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('open_jury') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('open_contestant') ? ' has-error' : '' }}">
                            <label for="open_contestant" class="col-md-4 control-label">Abierto para concursante</label>

                            <div class="col-md-6">
@if (isset($concurso))
{{ Form::select('open_contestant', ['1'=>'si','0'=>'no'],$concurso->open_contestant ,['class' => 'form-control', 'required'=>true]) }}
@else	
{{ Form::select('open_contestant', ['1'=>'si','0'=>'no'],null ,['class' => 'form-control', 'required'=>true]) }}
@endif
 
                                @if ($errors->has('open_contestant'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('open_contestant') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                                <a href="{{ URL::to('registerCompetition')}}" class="btn btn-default">Nuevo</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
        	<div class="panel panel-default">
        		<table class="table text-center">
        			<tr>
        				<td class="text-center">Nombre de consurso</td>
        				<td class="text-center">Activo</td>
        				<td class="text-center">Abierto para jurado</td>
        				<td class="text-center">Abierto para concursante</td>
        				<td class="text-center">Modificar</td>
        			</tr>
        			<body>
        		@foreach (App\Period::all() as $element)
        			<tr>
        				<td>{{ $element->nombre_concurso }}</td>
        				<td>@if ($element->active == 1)Si @else NO @endif</td>
        				<td>@if ($element->open_jury == 1)Si @else NO @endif</td>
        				<td>@if ($element->open_contestant == 1)Si @else NO @endif</td>
        				<td><a href="{{ URL::to('updateCompetition/'.$element->id)}}" class="btn btn-default">Modificar</a></td>
        			</tr>
                @endforeach
                	</body>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection