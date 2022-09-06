<?php

namespace App\Http\Controllers;

use App\Exports\SeccionsExport;
use App\Exports\TurnosExport;
use App\Http\Requests\SeccionRequest\SeccionRequest;
use App\Http\Requests\TurnoRequest\StoreTurnoRequest;
use App\Http\Requests\TurnoRequest\UpdateTurnoRequest;
use App\Models\Entidad;
use App\Models\Seccion;
use App\Models\Turno;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class TurnoController extends Controller
{
    /**
     * Endpoint para listar los turnos
     *
     * @OA\Get(
     *     path="/api/turnos",
     *     tags={"Turnos"},
     *     security={{"bearerAuth": {}}},
     *     summary="Lista todas los turnos",
     *     @OA\Response(
     *         response=200,
     *         description="Lista todas los turnos",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Turno")
     *         ),
     *     )
     * )
     *
     * @return JsonResponse
     */
    public function index()
    {
        return new JsonResponse(Turno::all());
    }

    /**
     * Endpoint para almacenar un turno
     * @OA\Post(
     *     path="/api/turnos",
     *     security={{"bearerAuth": {}}},
     *     tags={"Turnos"},
     *     summary="Crea un turno",
     *     requestBody={"$ref": "#/components/requestBodies/StoreTurno"},
     *     @OA\Response(
     *         response=200,
     *         description="Turno creado",
     *         @OA\JsonContent(ref="#/components/schemas/Turno")
     *     ),
     *
     *     @OA\Response(response=444, ref="#/components/responses/444")
     * )
     *
     * @param  \App\Http\Requests\TurnoRequest\StoreTurnoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTurnoRequest $request)
    {
        $turno = Turno::create($request->validated());
        return response($turno);
    }

    /**
     * Endpoint para mostrar un turno
     * @OA\Get(
     *     path="/api/turnos/{turnoID}",
     *     security={{"bearerAuth": {}}},
     *     tags={"Turnos"},
     *     summary="Muestra un turno por ID",
     *     @OA\PathParameter(
     *         name="turnoID",
     *         @OA\Schema(type="string"),
     *         description="ID del turno a obtener"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Detalles del turno",
     *         @OA\JsonContent(ref="#/components/schemas/Turno")
     *     ),
     *     @OA\Response(response=404, ref="#/components/responses/404")
     * )
     *
     *
     *
     * @param  \App\Models\Turno  $turno
     * @return JsonResponse
     */
    public function show(Turno $turno): JsonResponse
    {
        if($turno->exists()){
            return new JsonResponse($turno);
        }else{
            return new JsonResponse(['msg'=>'Turno not found'],404);
        }
    }

    /**
     * Endpoint para actualizar un turno
     *
     * @OA\Patch (
     *     path="/api/turnos/{turnoID}",
     *     security={{"bearerAuth": {}}},
     *     tags={"Turnos"},
     *     summary="Actualiza un turno",
     *     @OA\PathParameter(
     *         name="turnoID",
     *         @OA\Schema(type="string"),
     *         description="ID del turno a actualizar"
     *     ),
     *     requestBody={"$ref": "#/components/requestBodies/UpdateTurno"},
     *     @OA\Response(
     *         response=200,
     *         description="Turno actualizada",
     *         @OA\JsonContent(ref="#/components/schemas/Turno")
     *     ),
     *     @OA\Response(response=404, ref="#/components/responses/404")
     * )
     *
     *
     * @param  \App\Http\Requests\TurnoRequest\UpdateTurnoRequest  $request
     * @param  \App\Models\Turno  $turno
     * @return JsonResponse
     */

    public function update(UpdateTurnoRequest $request, Turno $turno): JsonResponse
    {
        if($turno->exists()){
            $turno->update($request->all());
            return new JsonResponse($turno);
        }else{
            return new JsonResponse(['msg'=>'Turno not found'],404);
        }
    }

    /**
     * Endpoint para eliminar un turno
     * @OA\Delete(
     *     path="/api/turnos/{turnoID}",
     *     security={{"bearerAuth": {}}},
     *     tags={"Turnos"},
     *     summary="Elimina un turno",
     *     @OA\PathParameter(
     *         name="turnoID",
     *         @OA\Schema(type="string"),
     *         description="ID del turno a eliminar"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Turno eliminada",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="deleted",example="true", type="boolean")
     *         )
     *     ),
     *     @OA\Response(response=404, ref="#/components/responses/404")
     * )
     *
     * @param  \App\Models\Turno  $turno
     * @return JsonResponse
     */
    public function destroy(Turno $turno): JsonResponse
    {
        if($turno->exists()){
            return new JsonResponse(['deleted' => $turno->delete()]);
        }else{
            return new JsonResponse(['msg' => 'Turno not found'],404);
        }
    }

    /**
     * Endpoint para mostrar todas los turnos asociadas a una seccion
     *
     ***
     * @OA\Post(
     *     path="/api/turnos/{seccionID}",
     *     security={{"bearerAuth": {}}},
     *     tags={"Turnos"},
     *     summary="Lista todos los turnos de 1 seccion",
     *     @OA\PathParameter(
     *         name="seccionID",
     *         @OA\Schema(type="string"),
     *         description="ID de la sección"
     *     ),
     *      @OA\Response(
     *         response=200,
     *         description="Lista todos los turnos de 1 seccion",
     *         @OA\JsonContent(ref="#/components/schemas/Turno")
     *     ),
     *     @OA\Response(response=404, ref="#/components/responses/404")
     * )
     *
     * @param  \App\Models\Seccion $seccion
     * @return JsonResponse
     */
    public function turnosSeccion(Seccion $seccion): JsonResponse
    {
        $turno = Turno::where('seccion_id',$seccion->id)->get();
        return new JsonResponse($turno);
    }

    /**
     * Endpoint para eliminar un turno
     * @OA\Delete(
     *     path="/api/turnos/{seccionID}/eliminar",
     *     security={{"bearerAuth": {}}},
     *     tags={"Turnos"},
     *     summary="Elimina todos los turnos de una sección",
     *     @OA\PathParameter(
     *         name="seccionID",
     *         @OA\Schema(type="string"),
     *         description="ID de la seccion"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Turnos eliminados",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="deleted",example="true", type="boolean")
     *         )
     *     ),
     *     @OA\Response(response=404, ref="#/components/responses/404")
     * )
     *
     * @param  \App\Models\Seccion  $seccion
     * @return JsonResponse
     */
    public function destroyAllFromSeccion(Seccion $seccion): JsonResponse
    {
        DB::table('turnos')->where('seccion_id', '=', $seccion->id)->delete();

        $seccion->turnoActual = 0;
        $seccion->ultimoTurno = 0;
        $seccion->save();

        return new JsonResponse(['Turnos borrados de la sección: ' => $seccion->nombreSeccion]);
    }

    /**
     * Endpoint to show all clients
     */
    public function export()
    {
        return Excel::download(new TurnosExport(),'turnos.xlsx');
    }
}
