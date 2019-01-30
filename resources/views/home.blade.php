@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Concurso de Cocina</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::user()->rols_id == 1)
                        <a href="{{ URL::to('registerUser')}}" class="btn btn-default">Registerar usuario</a>
                        <a href="{{ URL::to('registerCompetition')}}" class="btn btn-default">Concurso</a>
                    @endif
                    @if (Auth::user()->rols_id == 1 || Auth::user()->rols_id == 2 && Auth::user()->InversaUserPeriod->open_contestant == 1)
                        <a href="{{ URL::to('plate')}}" class="btn btn-default">platos</a>
                    @endif
                    @if (Auth::user()->rols_id == 1 || Auth::user()->rols_id == 3 && Auth::user()->InversaUserPeriod->open_jury == 1)
                    <a href="{{ URL::to('vote')}}" class="btn btn-default">Votaciones</a>
                    <a href="{{ URL::to('results')}}" class="btn btn-default">Resultados</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
