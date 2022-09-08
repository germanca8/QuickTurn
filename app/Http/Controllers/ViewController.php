<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvitadoRequest\InvitadoLoginRequest;
use App\Models\Entidad;
use App\Models\Invitado;
use App\Models\Seccion;
use App\Models\Turno;
use Illuminate\Http\JsonResponse;

class ViewController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function inicio(){
        //$secc = Http::get('seccion');
        //$seccion = $secciones->json();
        //$seccions = Seccion::where('id', '=', $secc);
        $seccion = Seccion::all();
        return view('quickturn')->with('seccion',$seccion);
    }

    public function indexTrabajador($secci)
    {
        $seccion = Seccion::where('id', '=', $secci);
        return view('inicio', compact('seccion'));
    }



    public function indexCliente()
    {
        $entidades = Entidad::paginate();
        return view('quickturn', compact('entidades'));
    }

    public function aumentarTurnoActual(Seccion $seccion)
    {
        if($seccion->turnoActual <= $seccion->ultimoTurno){
            $seccion->turnoActual = $seccion->turnoActual + 1;
            $seccion->save();
        }
        return redirect()->route('inicioTrabajador', $seccion->id);
    }

    public function disminuirTurnoActual(Seccion $seccion)
    {
        if($seccion->turnoActual > 0){
            $seccion->turnoActual = $seccion->turnoActual - 1;
            $seccion->save();
        }
        return redirect()->route('inicioTrabajador', $seccion->id);
    }

    /**
     * Endpoint para crear un invitado
     * @OA\Post(
     *     path="/api/invitados-store",
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
    public function storeInvitado(Entidad $entidad)
    {
        $invit = new Invitado();
        $invit->save();

        return redirect()->route('crear', [$entidad->id, $invit->id]);
        //return view('citaCliente', [$entidad->id, $invit->id]);
        //return new JsonResponse($invit);

    }

    public function solicitaTurnoCliente(Seccion $seccion, Invitado $invitado)
    {
        $entidad = Entidad::where('id', '=', $seccion->entidad_id)->get();

        $turno = new Turno();
        $turno->seccion_id = $seccion->id;
        $turno->invitado_id = $invitado->id;
        $turno->numTurno = $seccion->ultimoTurno + 1;
        $turno->fechaTurno = date('c');
        $turno->save();

        $seccion->ultimoTurno = $seccion->ultimoTurno + 1;
        $seccion->save();

        return redirect()->route('crear', [$entidad[0]->id, $invitado]);
    }

    public function verTurnoCliente(Entidad $entidad, Invitado $invitado)
    {
        /*$entidad = Entidad::where('id', '=', $seccion->entidad_id)->get();
        $turnos = Turno::where(['seccion_id' => $seccion->id, 'invitado_id' => $invitado->id])->get();

        $ultimoTurno = 0;
        foreach ($turnos as $turno)
        {
            if($turno->numTurno > $ultimoTurno)
            {
                $ultimoTurno = $turno->numTurno;
            }
        }
        $entidad = Entidad::where('id', '=', $seccion->entidad_id)->get();
*/
        return redirect()->route('crear', [$entidad, $invitado]);
    }
}
