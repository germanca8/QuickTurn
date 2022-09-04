<?php

namespace App\Http\Requests\UserRequests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
     *     request="UserLogin",
     *     description="User that needs to be logued",
     *     required=true,
     *     @OA\JsonContent(
     *         type="object",
     *         required={"email", "password"},
     *         @OA\Property(ref="#/components/schemas/User/properties/email", property="email"),
     *         @OA\Property(ref="#/components/schemas/User/properties/password", property="password"),
     *     )
     * )
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }
}
