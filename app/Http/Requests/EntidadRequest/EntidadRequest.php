<?php

namespace App\Http\Requests\EntidadRequest;

use Illuminate\Foundation\Http\FormRequest;

class EntidadRequest extends FormRequest
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
     *     request="EntidadRequest",
     *     description="ID de la entidad",
     *     required=true,
     *     @OA\JsonContent(
     *         type="object",
     *         required={"id"},
     *
     *         @OA\Property(ref="#/components/schemas/Entidad/properties/id", property="id"),
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

