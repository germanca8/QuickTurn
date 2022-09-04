<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntidadRequest\StoreEntidadRequest;
use App\Http\Requests\EntidadRequest\UpdateEntidadRequest;
use App\Http\Requests\UserRequests\UserRequest;
use App\Models\Entidad;
use Illuminate\Http\JsonResponse;

class EntidadController extends Controller
{
    /**
     * Endpoint para listar las entidades
     *
     * @OA\Get(
     *     path="/api/entidads",
     *     tags={"Entidades"},
     *     security={{"bearerAuth": {}}},
     *     summary="Lista todas las entidades",
     *     @OA\Response(
     *         response=200,
     *         description="Lista todas las entidades",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Entidad")
     *         ),
     *     )
     * )
     *
     * @return JsonResponse
     */
    public function index()
    {
        return new JsonResponse(Entidad::all());
    }

    /**
     * Endpoint para almacenar una entidad
     * @OA\Post(
     *     path="/api/entidads",
     *     security={{"bearerAuth": {}}},
     *     tags={"Entidades"},
     *     summary="Crea una entidad",
     *     requestBody={"$ref": "#/components/requestBodies/StoreEntidad"},
     *     @OA\Response(
     *         response=200,
     *         description="Entidad creada",
     *         @OA\JsonContent(ref="#/components/schemas/Entidad")
     *     ),
     *
     *     @OA\Response(response=444, ref="#/components/responses/444")
     * )
     *
     * @param  \App\Http\Requests\EntidadRequest\StoreEntidadRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEntidadRequest $request)
    {
        $entidad = Entidad::create($request->validated());
        return response($entidad);
    }

    /**
     * Endpoint para mostrar una entidad
     * @OA\Get(
     *     path="/api/entidads/{entidadID}",
     *     security={{"bearerAuth": {}}},
     *     tags={"Entidades"},
     *     summary="Muestra una entidad por ID",
     *     @OA\PathParameter(
     *         name="entidadID",
     *         @OA\Schema(type="string"),
     *         description="ID de la entidad a obtener"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Detalles de la entidad",
     *         @OA\JsonContent(ref="#/components/schemas/Entidad")
     *     ),
     *     @OA\Response(response=404, ref="#/components/responses/404")
     * )
     *
     *
     *
     * @param  \App\Models\Entidad  $entidad
     * @return JsonResponse
     */
    public function show(Entidad $entidad): JsonResponse
    {
        if($entidad->exists()){
            return new JsonResponse($entidad);
        }else{
            return new JsonResponse(['msg'=>'Entidad not found'],404);
        }
    }

    /**
     * Endpoint para actualizar una entidad
     *
     * @OA\Patch (
     *     path="/api/entidads/{entidadID}",
     *     security={{"bearerAuth": {}}},
     *     tags={"Entidades"},
     *     summary="Actualiza una entidad",
     *     @OA\PathParameter(
     *         name="entidadID",
     *         @OA\Schema(type="string"),
     *         description="ID de la entidad a actualizar"
     *     ),
     *     requestBody={"$ref": "#/components/requestBodies/UpdateEntidad"},
     *     @OA\Response(
     *         response=200,
     *         description="Entidad actualizada",
     *         @OA\JsonContent(ref="#/components/schemas/Entidad")
     *     ),
     *     @OA\Response(response=404, ref="#/components/responses/404")
     * )
     *
     *
     * @param  \App\Http\Requests\EntidadRequest\UpdateEntidadRequest  $request
     * @param  \App\Models\Entidad  $entidad
     * @return JsonResponse
     */

    public function update(UpdateEntidadRequest $request, Entidad $entidad): JsonResponse
    {
        if($entidad->exists()){
            $entidad->update($request->all());
            return new JsonResponse($entidad);
        }else{
            return new JsonResponse(['msg'=>'Entidad not found'],404);
        }
    }

    /**
     * Endpoint para eliminar una entidad
     * @OA\Delete(
     *     path="/api/entidads/{entidadID}",
     *     security={{"bearerAuth": {}}},
     *     tags={"Entidades"},
     *     summary="Elimina una entidad",
     *     @OA\PathParameter(
     *         name="entidadID",
     *         @OA\Schema(type="string"),
     *         description="ID de la entidad a eliminar"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Entidad eliminada",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="deleted",example="true", type="boolean")
     *         )
     *     ),
     *     @OA\Response(response=404, ref="#/components/responses/404")
     * )
     *
     * @param  \App\Models\Entidad  $entidad
     * @return JsonResponse
     */
    public function destroy(Entidad $entidad): JsonResponse
    {
        if($entidad->exists()){
            return new JsonResponse(['deleted' => $entidad->delete()]);
        }else{
            return new JsonResponse(['msg' => 'Entidad not found'],404);
        }
    }

    /**
     * Endpoint para mostrar todas las entidades asociadas a un usuario
     *
     ***
     * @OA\Post(
     *     path="/api/entidads/users",
     *     security={{"bearerAuth": {}}},
     *     tags={"Entidades"},
     *     summary="Lista todas las entidades de 1 usuario",
     *     requestBody={"$ref": "#/components/requestBodies/EntidadRequest"},
     *      @OA\Response(
     *         response=200,
     *         description="Lista todas las entidades de 1 usuario",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Entidad")
     *         ),
     *     ),
     *     @OA\Response(response=404, ref="#/components/responses/404")
     * )
     *
     *
     * @param  \App\Http\Requests\UserRequests\UserRequest  $request
     * @return JsonResponse
     */
    public function entidadsUser(UserRequest $request): JsonResponse
    {
        $entidad=Entidad::where('user_id',$request->validated('id'))->get();
        return new JsonResponse($entidad);
    }
}
