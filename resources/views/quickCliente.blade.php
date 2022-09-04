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
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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
<div style="border-radius:0.5px; color: #000000; position: absolute; min-height: 100%; min-width: 100%; font-family: Nunito">


    <!-- Title section-->
    <section class="m-3" style="height: 7vh; vertical-align: center">
        <div class="container px-2 pt-2 pb-2 mt-3 mb-3"
             style="background-color: #9ED2C6; opacity: 0.7; height: 100%; display: flow; border: 2px; border-radius:0.5rem">
            <h1 style="vertical-align: middle; font-weight: bold; color: #FFFFFF;"
                class="mb-0">QuickTurn</h1>
        </div>
    </section>

    <!-- Cliente section-->
    <section class="m-3"
             style="min-height: 20vh; max-height: 28vh; height: 24vh; display: flex; flex-direction: column; font-weight: bold; color: #FFFFFF">
        <div class="container pt-2 pb-2 mt-3 mb-3" style="background-color: #9ED2C6; opacity: 0.7; display: flow; border: 2px; border-radius:0.5rem">
            <h2 class="text-center"
                style="font-weight: bold;">Accede para ver las secciones
            </h2>
            <button class="btn flex-shrink-0 mt-3 mb-3"
                    style="background-color: #318C8B; width: 100%; text-underline: none;"
            ><a class="p-6 pt-2 pb-2" href="{{route('invitados.storeInvitado', $entidad) }}">¡Pide cita!</a>
            </button>
        </div>
    </section>

    <!-- Entidad section-->
    <section class="m-3"
             style="height: 40vh; color: #FFFFFF">
        <div class="container px-2 pt-2 pb-2 mt-3 mb-4"
             style="background-color: #9ED2C6; opacity: 0.7; height: 100%; border: 2px; border-radius:0.5rem">
            <h2 class="text-center mb-4"
                style="height: 10%; font-weight: bold;">Acerca de @yield('nombreEntidad')
            </h2>
            <div style="height: 86%; display: flow">
                <div class="mb-2"
                     style="background-color: #9ED2C6; height: 35%; font-weight: normal; text-align: center; font-size: 1rem">
                    <i class="fas fa-map" style="font-size:24px;"></i>
                    <h3> @yield('direccionEntidad')</h3>
                </div>

                <div class="mb-2"
                     style="background-color: #9ED2C6; height: 25%; font-weight: normal; text-align: center; font-size: 1rem">
                    <i class="far fa-clock" style="font-size:24px;"></i>
                    <h3> @yield('horarioEntidad')</h3>
                </div>

                <div
                     style="background-color: #9ED2C6; height: 25%; font-weight: normal; text-align: center; font-size: 1rem">
                    <i class="fas fa-location-dot" style="font-size:24px;"></i>
                    <h3> <a href=" @yield('urlEntidad')" style="color: #1C4848;">@yield('urlEntidad')</a></h3>
                </div>
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

