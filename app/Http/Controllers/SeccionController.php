<?php

namespace App\Http\Controllers;

use App\Exports\DataExport;
use App\Exports\SeccionsExport;
use App\Http\Requests\EntidadRequest\EntidadRequest;
use App\Http\Requests\SeccionRequest\SeccionRequest;
use App\Http\Requests\SeccionRequest\StoreSeccionRequest;
use App\Http\Requests\SeccionRequest\UpdateSeccionRequest;
use App\Models\Entidad;
use App\Models\Seccion;
use App\Models\Turno;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Maatwebsite\Excel\Facades\Excel;

class SeccionController extends Controller
{
    /**
     * Endpoint para listar las secciones
     *
     * @OA\Get(
     *     path="/api/seccions",
     *     tags={"Secciones"},
     *     security={{"bearerAuth": {}}},
     *     summary="Lista todas las secciones",
     *     @OA\Response(
     *         response=200,
     *         description="Lista todas las secciones",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Seccion")
     *         ),
     *     )
     * )
     *
     * @return JsonResponse
     */
    public function index()
    {
        return new JsonResponse(Seccion::all());
    }

    /**
     * Endpoint para almacenar una seccion
     * @OA\Post(
     *     path="/api/seccions",
     *     security={{"bearerAuth": {}}},
     *     tags={"Secciones"},
     *     summary="Crea una seccion",
     *     requestBody={"$ref": "#/components/requestBodies/StoreSeccion"},
     *     @OA\Response(
     *         response=200,
     *         description="Seccion creada",
     *         @OA\JsonContent(ref="#/components/schemas/Seccion")
     *     ),
     *
     *     @OA\Response(response=444, ref="#/components/responses/444")
     * )
     *
     * @param  \App\Http\Requests\SeccionRequest\StoreSeccionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSeccionRequest $request)
    {
        $seccion = Seccion::create($request->validated());
        return response($seccion);
    }

    /**
     * Endpoint para mostrar una seccion
     * @OA\Get(
     *     path="/api/seccions/{seccionID}",
     *     security={{"bearerAuth": {}}},
     *     tags={"Secciones"},
     *     summary="Muestra una seccion por ID",
     *     @OA\PathParameter(
     *         name="seccionID",
     *         @OA\Schema(type="string"),
     *         description="ID de la seccion a obtener"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Detalles de la seccion",
     *         @OA\JsonContent(ref="#/components/schemas/Seccion")
     *     ),
     *     @OA\Response(response=404, ref="#/components/responses/404")
     * )
     *
     *
     *
     * @param  \App\Models\Seccion  $seccion
     * @return JsonResponse
     */
    public function show(Seccion $seccion): JsonResponse
    {
        if($seccion->exists()){
            return new JsonResponse($seccion);
        }else{
            return new JsonResponse(['msg'=>'Seccion not found'],404);
        }
    }

    /**
     * Endpoint para actualizar una seccion
     *
     * @OA\Patch (
     *     path="/api/seccions/{seccionID}",
     *     security={{"bearerAuth": {}}},
     *     tags={"Secciones"},
     *     summary="Actualiza una seccion",
     *     @OA\PathParameter(
     *         name="seccionID",
     *         @OA\Schema(type="string"),
     *         description="ID de la seccion a actualizar"
     *     ),
     *     requestBody={"$ref": "#/components/requestBodies/UpdateSeccion"},
     *     @OA\Response(
     *         response=200,
     *         description="Seccion actualizada",
     *         @OA\JsonContent(ref="#/components/schemas/Seccion")
     *     ),
     *     @OA\Response(response=404, ref="#/components/responses/404")
     * )
     *
     *
     * @param  \App\Http\Requests\SeccionRequest\UpdateSeccionRequest  $request
     * @param  \App\Models\Seccion  $seccion
     * @return JsonResponse
     */

    public function update(UpdateSeccionRequest $request, Seccion $seccion): JsonResponse
    {
        if($seccion->exists()){
            $seccion->update($request->all());
            return new JsonResponse($seccion);
        }else{
            return new JsonResponse(['msg'=>'Seccion not found'],404);
        }
    }

    /**
     * Endpoint para aumentar el turno actual de la sección
     *
     * @OA\Post (
     *     path="/api/seccions/{seccion}/aumentarTurnoActual",
     *     tags={"Trabajadores"},
     *     summary="Aumenta el turno actual de la sección",
     *     @OA\PathParameter(
     *         name="seccion",
     *         @OA\Schema(type="string"),
     *         description="ID de la seccion a actualizar"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Turno aumentado",
     *         @OA\JsonContent(ref="#/components/schemas/Seccion")
     *     ),
     *     @OA\Response(response=404, ref="#/components/responses/404")
     * )
     *
     *
     * @param  \App\Models\Seccion  $seccion
     * @return JsonResponse
     */

    public function aumentarTurnoActual(Seccion $seccion): JsonResponse
    {
        if($seccion->exists()){
            $seccion->turnoActual = $seccion->turnoActual + 1;
            $seccion->save();
            return new JsonResponse($seccion);
        }else{
            return new JsonResponse(['msg'=>'Seccion not found'],404);
        }
    }

    /**
     * Endpoint para ver el turno actual de la sección
     *
     * @OA\Get (
     *     path="/api/seccions/{seccion}/verTurnoActual",
     *     tags={"Trabajadores"},
     *     summary="Imprime el turno actual de la sección",
     *     @OA\PathParameter(
     *         name="seccion",
     *         @OA\Schema(type="string"),
     *         description="ID de la seccion de la que quiero el turno"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Turno impreso",
     *         @OA\JsonContent(ref="#/components/schemas/Seccion")
     *     ),
     *     @OA\Response(response=404, ref="#/components/responses/404")
     * )
     *
     *
     * @param  \App\Models\Seccion  $seccion
     * @return JsonResponse
     */

    public function verTurnoActual(Seccion $seccion): JsonResponse
    {
        if($seccion->exists()){
            return new JsonResponse($seccion->turnoActual);
        }else{
            return new JsonResponse(['msg'=>'Seccion not found'],404);
        }
    }

    /**
     * Endpoint para eliminar una seccion
     * @OA\Delete(
     *     path="/api/seccions/{seccionID}",
     *     security={{"bearerAuth": {}}},
     *     tags={"Secciones"},
     *     summary="Elimina una seccion",
     *     @OA\PathParameter(
     *         name="seccionID",
     *         @OA\Schema(type="string"),
     *         description="ID de la seccion a eliminar"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Seccion eliminada",
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
    public function destroy(Seccion $seccion): JsonResponse
    {
        if($seccion->exists()){
            return new JsonResponse(['deleted' => $seccion->delete()]);
        }else{
            return new JsonResponse(['msg' => 'Seccion not found'],404);
        }
    }

    /**
     * Endpoint para mostrar todas las secciones asociadas a una entidad
     *
     ***
     * @OA\Post(
     *     path="/api/seccions/{entidadID}",
     *     security={{"bearerAuth": {}}},
     *     tags={"Secciones"},
     *     summary="Lista todas las secciones de 1 entidad",
     *     @OA\PathParameter(
     *         name="entidadID",
     *         @OA\Schema(type="string"),
     *         description="ID de la entidad"
     *     ),
     *      @OA\Response(
     *         response=200,
     *         description="Lista todas las secciones de 1 entidad",
     *         @OA\JsonContent(ref="#/components/schemas/Seccion")
     *     ),
     *     @OA\Response(response=404, ref="#/components/responses/404")
     * )
     *
     *
     * @param  \App\Models\Entidad $entidad
     * @return JsonResponse
     */
    public function seccionsEntidad(Entidad $entidad): JsonResponse
    {
        $seccion = Seccion::where('entidad_id',$entidad->id)->get();
        return new JsonResponse($seccion);
    }

    /**
     * Endpoint to show all clients
     */
    public function export()
    {
        return Excel::download(new SeccionsExport(),'secciones.xlsx');
    }
}
