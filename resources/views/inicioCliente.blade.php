@extends('quickCliente')

@section('nombreEntidad')
    {{ \App\Models\Entidad::where('id', '=', $entidad)->get()[0]['nombreEntidad'] }}
@endsection

@section('direccionEntidad')
    {{ \App\Models\Entidad::where('id', '=', $entidad)->get()[0]['direccionEntidad'] }}

@endsection
@section('horarioEntidad')
    {{ \App\Models\Entidad::where('id', '=', $entidad)->get()[0]['horarioEntidad'] }}
@endsection

@section('urlEntidad')
    {{ \App\Models\Entidad::where('id', '=', $entidad)->get()[0]['url'] }}
@endsection

