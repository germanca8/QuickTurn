<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  style="background-color: #FFFFFF">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css')}}" rel="stylesheet" />
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico')}}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <title>QuickTurn - Cliente</title>

    <style type="text/css">
        a:link, a:visited {
            text-decoration:none;
            color: #FFFFFF;
        }
        a:active {
            text-decoration:none;
            color: #000000;
        }
    </style>
</head>
<body class="antialiased">
<div style="border-radius:25px; color: #000000; position: absolute; min-height: 100%; min-width: 100%; font-family: Nunito">


    <!-- Title section-->
    <section class="m-3" style="height: 7vh; vertical-align: center">
        <div class="container px-2 pt-2 pb-2 mt-3 mb-3"
             style="background-color: #9ED2C6; opacity: 0.7; height: 100%; display: flow; border: 2px; border-radius:0.25rem">
            <h1 style="vertical-align: middle; font-weight: bold; color: #FFFFFF;"
                class="mb-0">QuickTurn</h1>
        </div>
    </section>

    <!-- Entidad section-->
    <section class="m-3"
             style="height: 66vh; color: #FFFFFF">
        <div class="container px-2 pt-2 pb-2 mt-3 mb-3"
             style="background-color: #9ED2C6; opacity: 0.7; height: 100%; border: 2px; border-radius:0.25rem">
            <h2 class="text-center"
                style="height: 6%; font-weight: bold;">
                @yield('nombreEntidad')
            </h2>

            <div style="height: 92%; display: flow; overflow-y: scroll">
                @foreach($secciones as $seccion)
                    <div class="card m-1 mb-2 pb-2 pt-2" style=" background-color: #54BAB9; height: 8rem; font-weight: normal;">
                        <h3 class="mb-0" style="text-align: center; font-size: 1rem">{{ $seccion->nombreSeccion }}</h3>
                        <div style="display: flex; flex-wrap: wrap;">
                            <div style="height: 80%; width: 40%" class="mt-2">
                                <p class=" m-2 mt-1 mb-0" style="height: 26%; text-align: left; font-size: 1rem">TURNOS</p>
                                <p class=" m-2 mt-0 mb-0" style="height: 26%; text-align: left; font-size: 1rem">Actual: {{ $seccion->turnoActual }}</p>

                                @if( \App\Models\Turno::where('seccion_id',$seccion->id)->where('invitado_id',$invitado)->get()->isNotEmpty() )
                                    @php
                                        $ultimoTurno = 0
                                    @endphp
                                    @foreach (\App\Models\Turno::where('seccion_id',$seccion->id)->where('invitado_id',$invitado)->get() as $turno)
                                        @if($turno->numTurno > $ultimoTurno)
                                            @php
                                                $ultimoTurno = $turno->numTurno
                                            @endphp
                                        @endif
                                    @endforeach
                                    <p class=" m-2 mt-0 mb-1" style="height: 26%; text-align: left; font-size: 1rem">Mio: {{ $turno->numTurno }}</p>
                                @else
                                    <p class=" m-2 mt-0 mb-1" style="height: 26%; text-align: left; font-size: 1rem">Mio: - </p>
                                @endif
                            </div>

                            <div style="height: 60%; width: 30%">
                                <button class="btn flex-shrink-0 p-0 mt-3 mb-2"
                                        style="background-color: #318C8B; width: 90%; text-underline: none;"
                                ><a class="p-2 pt-2 pb-2" href="{{route('solicitaTurnoCliente', [$seccion->id, $invitado]) }}">Solicitar turno</a>
                                </button>
                            </div>

                            <div style="height: 60%; width: 30%">
                                <button class="btn flex-shrink-0 p-0 mt-3 mb-2"
                                        style="background-color: #318C8B; width: 90%; text-underline: none;"
                                ><a class="p-2 pt-2 pb-2" href="{{route('verTurnoCliente', [$seccion->id, $invitado]) }}">Mostrar turno</a>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="py-3"
            style="height: 20vh; background-color: #FFFFFF; position: fixed; bottom: 0; width: 100%; text-align: center;">
        <img src="{{ asset('img/LogoQuickTurn1.jpeg') }}"
             alt="QuickTurn Logo"
             class="center"
             style="width: 8rem;">
        <div class="container"><p class="m-0 text-center">QuickTurn&copy; 2022</p></div>
    </footer>
</div>
</body>
</html>

