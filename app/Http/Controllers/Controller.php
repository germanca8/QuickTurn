<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Quick Turn",
 *      description="Documentación de API QuickTurn",
 *      x={
 *          "logo": {
 *              "url": "https://via.placeholder.com/190x90.png?text=L5-Swagger"
 *          }
 *      },
 *      @OA\Contact(
 *          email="germanca8@correo.ugr.es"
 *      ),
 *      @OA\License(
 *         name="Apache 2.0",
 *         url="https://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 ** @OA\SecurityScheme(
 *      securityScheme="bearerAuth",
 *      type="http",
 *      scheme="bearer"
 * )
 * @OA\Response(
 *     response=422,
 *     description="Validation error",
 *     @OA\JsonContent(
 *         @OA\Property(
 *             property="message",
 *             type="string"
 *         ),
 *         @OA\Property(
 *             property="errors",
 *             type="object",
 *             @OA\Property(
 *                 property="field",
 *                 type="array",
 *                 @OA\Items(type="string")
 *             )
 *         )
 *     )
 * )
 * @OA\Response(
 *     response=404,
 *     description="No query results for model",
 *     @OA\JsonContent(
 *         @OA\Property(
 *             property="message",
 *             type="string",
 *         )
 *     )
 * )
 *
 * @OA\Response(
 *     response=444,
 *     description="Name its already used",
 *     @OA\JsonContent(
 *         @OA\Property(
 *             property="message",
 *             type="string",
 *             example="Name is already used"
 *         )
 *     )
 * )
 *


 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


}
