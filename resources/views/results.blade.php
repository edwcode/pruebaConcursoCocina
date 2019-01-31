@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Resultados</div>

                <div class="panel-body">
                    <table class="table text-center">
                   @foreach (App\Period::where('active',0)->get() as $element)
                        <tr class="active">
                            <td colspan="5"><strong>Evento:</strong> {{ $element->nombre_concurso }}</td>
                        </tr>
                        @if ($element->PeriodUser != '[]')
                            @foreach ($element->PeriodUser as $user)
                            @if ($user->rols_id == 2)
                                    <tr class="success">
                                        <td colspan="5"><strong>Concursante:</strong> {{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">Valoracion:</td>
                                    </tr>

                                    @foreach ($user->UserPlate as $plate)
                                        <tr class="active">
                                            <td colspan="3"><strong>Plato:</strong> {{ $plate->titulo }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Comentario:</td>
                                            <td>Foto</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">{{ $plate->comentario }}</td>
                                            <td><img src="{{ asset('assets/files/fotos/'.$plate->foto ) }}" width="100px"></td>
                                        </tr>
                                        <tr class="active">
                                            <td>Sabor</td>
                                            <td>Imagen</td>
                                            <td>Elaboracion</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $plate->plateVote->last()->sabor }}</td>
                                            <td>{{ $plate->plateVote->last()->imagen }}</td>
                                            <td>{{ $plate->plateVote->last()->elaboracion }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="5"><strong>Media:</strong> 
                                                <?php
                                                    $media = $plate->plateVote->last()->sabor + $plate->plateVote->last()->imagen + $plate->plateVote->last()->elaboracion; 
                                                ?>
                                                {{ $media/3 }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            @endforeach
                        @else
                        <tr>
                            <td colspan="2">NO hay concursantes registrados</td>
                        </tr>
                        @endif
                        
                   @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection