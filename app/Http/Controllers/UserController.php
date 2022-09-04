<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequests\UserLoginRequest;
use App\Http\Requests\UserRequests\UserRegisterRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Log the user and response his token
     * @OA\Post(
     *     path="/api/login",
     *     tags={"Session"},
     *     summary="Log user",
     *     requestBody={"$ref": "#/components/requestBodies/UserLogin"},
     *     @OA\Response(
     *         response=200,
     *         description="Logued User",
     *         @OA\JsonContent(
     *              @OA\Property(property="token", example="ads12389dsah1nd180", type="string"),
     *         ),
     *
     *     ),
     *     @OA\Response(response=404, ref="#/components/responses/404"),
     * )
     *
     * @param UserRegisterRequest $request
     * @return JsonResponse
     */
    public function  login(UserLoginRequest $request): JsonResponse
    {
        if (!Auth::guard('api')->attempt($request->all())) {
            return new JsonResponse(["msg"=>"Credenciales incorrectas"],403);
        }else{
            $user = auth()->user();
            $response['user'] = $user;
            $response['token'] =  $user->createToken('auth-token')->plainTextToken;
        }
        return new JsonResponse($response, 200);
    }
}
