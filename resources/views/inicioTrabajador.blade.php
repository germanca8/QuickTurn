@extends('quickTrabajador')

@section('nombreSeccion')
    {{ \App\Models\Seccion::where('id', '=', $seccion)->get()[0]['nombreSeccion'] }}
@endsection
@section('turnoActual')
    {{ \App\Models\Seccion::where('id', '=', $seccion)->get()[0]['turnoActual'] }}

@endsection
@section('ultimoTurno')
    {{ \App\Models\Seccion::where('id', '=', $seccion)->get()[0]['ultimoTurno'] }}
@endsection

@section('Turnos')
        @foreach(\App\Models\Turno::where('seccion_id',$seccion)->get() as $turno)
            @if($turno->numTurno > \App\Models\Seccion::where('id', '=', $seccion)->get()[0]['turnoActual'])
                <div class="card m-1 mb-2 pb-2 pt-2" style=" background-color: #54BAB9; height: 6rem; font-weight: normal">
                    <p class="mb-0" style="text-align: center; font-size: 1rem">Turno: {{ $turno->numTurno }}</p>
                    <p class="mb-0" style="text-align: center; font-size: 1rem">Fecha: {{ $turno->fechaTurno }}</p>
                </div>
            @endif
        @endforeach
@endsection




