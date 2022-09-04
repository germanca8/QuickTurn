<?php

namespace App\Http\Requests\SeccionRequest;

use Illuminate\Foundation\Http\FormRequest;

class SeccionRequest extends FormRequest
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
     *     request="SeccionRequest",
     *     description="ID de la seccion",
     *     required=true,
     *     @OA\JsonContent(
     *         type="object",
     *         required={"id"},
     *
     *         @OA\Property(ref="#/components/schemas/Seccion/properties/id", property="id"),
     *     )
     * )
     *
     * @return array
     */
    public function rules()
    {
        return [

            'id'=>'required|string'
        ];
    }
}

