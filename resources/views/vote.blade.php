@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registro de votaciones</div>

                <div class="panel-body">
                    <table class="table text-center">
                        <header>
                        <tr>
                            <td> <strong>titulo</strong></td>
                            <td><strong>comentario</strong></td>
                            <td><strong>foto</strong></td>
                            <td><strong>Valorar</strong></td>
                        </tr>    
                        </header>
                        <body>

                    @foreach (App\Plate::all() as $element)
                        @if (App\Plate::find($element->id)->plateVote == '[]')
                        <tr>
                            <td>{{ $element->titulo }}</td>
                            <td>{{ $element->comentario }}</td>
                            <td><img src="{{ asset('assets/files/fotos/'.$element->foto ) }}" width="30px"></td>
                            <td><a href="{{ URL::to('evaluate/'.$element->id)}}" class="btn btn-default">Valorar</a></td>
                        </tr>
                        @endif
                    @endforeach
                         </body>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection