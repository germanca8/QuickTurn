<?php

namespace App\Http\Requests\UserRequests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * * * @OA\RequestBody(
     *     request="UserRegister",
     *     description="User that needs to be registered in the store",
     *     required=true,
     *     @OA\JsonContent(
     *         type="object",
     *         required={"name","email", "password","confirm_password"},
     *
     *         @OA\Property(ref="#/components/schemas/User/properties/name", property="name"),
     *         @OA\Property(ref="#/components/schemas/User/properties/fullName", property="fullName"),
     *         @OA\Property(ref="#/components/schemas/User/properties/dni", property="dni"),
     *         @OA\Property(ref="#/components/schemas/User/properties/telefono", property="telefono"),
     *         @OA\Property(ref="#/components/schemas/User/properties/domicilio", property="domicilio"),
     *         @OA\Property(ref="#/components/schemas/User/properties/email", property="email"),
     *         @OA\Property(ref="#/components/schemas/User/properties/password", property="password"),
     *         @OA\Property(ref="#/components/schemas/User/properties/password", property="confirm_password"),
     *     )
     * )
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|string|max:52',
            'fullName'=>'nullable|string|max:255',
            'dni'=>'nullable|string|max:16',
            'telefono'=>'nullable|string|max:16',
            'domicilio'=>'nullable|string|max:255',
            'email'=>'required|email|unique:users',
            'password'=>'required|string|min:6',
            'confirm_password'=>'required|same:password|min:6'
        ];
    }
}
