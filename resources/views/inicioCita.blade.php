@extends('citaCliente')

@section('nombreEntidad')
    {{ \App\Models\Entidad::where('id', '=', $entidad)->get()[0]['nombreEntidad'] }}
@endsection

@section('secciones')
    {{ $secciones = \App\Models\Seccion::where('entidad_id', '=', $entidad)->get() }}
@endsection


