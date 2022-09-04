<?php

namespace App\Http\Controllers;

use App\Models\Entidad;
use App\Models\Invitado;
use App\Models\Seccion;
use App\Models\Turno;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class InvitadoController extends Controller
{
    /**
     * Endpoint para crear un invitado
     * @OA\Post(
     *     path="/api/invitados",
     *     tags={"Clientes"},
     *     summary="Crea un invitado",
     *     @OA\Response(
     *         response=200,
     *         description="Invitado creado",
     *         @OA\JsonContent(ref="#/components/schemas/Invitado")
     *     ),
     *
     *     @OA\Response(response=444, ref="#/components/responses/444")
     * )
     *
     * @param  Entidad $entidad
     */
    public function store(Entidad $entidad)
    {
        $invitado = new Invitado();
        $invitado->save();

        return response($invitado);
    }

    /**
     * Endpoint para crear un turno
     * @OA\Get (
     *     path="/api/turnos/{seccionID}/invitado/{invitadoID}/solicitaTurno",
     *     tags={"Clientes"},
     *     summary="Solicita un turno",
     *     @OA\PathParameter(
     *         name="seccionID",
     *         @OA\Schema(type="string"),
     *         description="ID de la sección"
     *     ),
     *     @OA\PathParameter(
     *         name="invitadoID",
     *         @OA\Schema(type="string"),
     *         description="ID del invitado"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Turno solicitado",
     *         @OA\JsonContent(ref="#/components/schemas/Turno")
     *     ),
     *
     *     @OA\Response(response=444, ref="#/components/responses/444")
     * )
     *
     * @param  \App\Models\Seccion $seccion
     * @param  \App\Models\Invitado $invitado
     * @return JsonResponse
     */
    public function solicitaTurno(Seccion $seccion, Invitado $invitado)
    {
        $turno = new Turno();
        $turno->seccion_id = $seccion->id;
        $turno->invitado_id = $invitado->id;
        $turno->numTurno = $seccion->ultimoTurno + 1;
        $turno->fechaTurno = date('c');
        $turno->save();

        $seccion->ultimoTurno = $seccion->ultimoTurno + 1;
        $seccion->save();
        return new JsonResponse($turno);
    }

    /**
     * Endpoint para ver el turno actual del cliente
     *
     * @OA\Get (
     *     path="/api/turnos/{seccionID}/invitado/{invitadoID}/verTurno",
     *     tags={"Clientes"},
     *     summary="Imprime el turno actual del invitado para una seccion",
     *     @OA\PathParameter(
     *         name="seccionID",
     *         @OA\Schema(type="string"),
     *         description="ID de la sección"
     *     ),
     *     @OA\PathParameter(
     *         name="invitadoID",
     *         @OA\Schema(type="string"),
     *         description="ID del invitado"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Turno impreso",
     *         @OA\JsonContent(ref="#/components/schemas/Turno")
     *     ),
     *     @OA\Response(response=404, ref="#/components/responses/404")
     * )
     *
     *
     * @param  \App\Models\Seccion $seccion
     * @param  \App\Models\Invitado $invitado
     * @return JsonResponse
     */

    public function verTurno(Seccion $seccion, Invitado $invitado): JsonResponse
    {
        $turnos = Turno::where('seccion_id',$seccion->id)->where('invitado_id',$invitado->id)->get();

        $ultimoTurno = 0;
        foreach ($turnos as $turno)
        {
            if($turno->numTurno > $ultimoTurno)
            {
                $ultimoTurno = $turno->numTurno;
            }
        }

        if($turno->exists()){
            return new JsonResponse($turno->numTurno);
        }else{
            return new JsonResponse(['msg'=>'Turno not found'],404);
        }
    }

}
