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

    <title>QuickTurn - Trabajador</title>

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

    <!-- Product section-->
    <section class="m-3"
             style="min-height: 20vh; max-height: 38vh; height: 34vh; display: flex; flex-direction: column; font-weight: bold; color: #FFFFFF">
        <div class="container pt-2 pb-2 mt-3 mb-3" style="background-color: #9ED2C6; opacity: 0.7; height: 100%; display: flow; border: 2px; border-radius:0.25rem">
            <h3 style="text-align: justify; font-weight: bold">@yield('nombreSeccion')</h3>
            <h5 class="fw-normal">Turno actual: @yield('turnoActual')</h5>
            <h5 class="fw-normal">Último turno reservado: @yield('ultimoTurno')</h5>
            <div>
                <button class="btn flex-shrink-0 mb-2"
                        style="background-color: #318C8B; width: 100%; text-underline: none"
                        type="button"
                    ><a href="{{ route('turno.aumentar', $seccion) }}">Pasar turno </a>
                </button>
                <button class="btn flex-shrink-0"
                        style="background-color: #318C8B; width: 100%; text-underline: none"
                        type="button"
                ><a href="{{ route('turno.disminuir', $seccion) }}">Volver al turno anterior </a>
                </button>

            </div>
        </div>
    </section>

    <!-- Related items section-->
    <section class="m-3"
             style="height: 36vh; color: #FFFFFF">
        <div class="container px-2 pt-2 pb-2 mt-3 mb-3" style="background-color: #9ED2C6; opacity: 0.7; height: 100%; border: 2px; border-radius:0.25rem">
            <h3 class="text-center"
                style="font-weight: bold;">Turnos siguientes
            </h3>
            <div style="height: 86%; display: flow; overflow-y: scroll">
                @yield('Turnos')
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="py-3"
            style="height: 15vh; background-color: #FFFFFF; position: fixed; bottom: 0; width: 100%; text-align: center;">
        <img src="{{ asset('img/LogoQuickTurn1.jpeg') }}"
             alt="QuickTurn Logo"
             class="center"
             style="width: 8rem;">
        <div class="container"><p class="m-0 text-center">QuickTurn&copy; 2022</p></div>
    </footer>
</div>
</body>
</html>

