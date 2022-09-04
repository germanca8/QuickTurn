<?php

namespace App\Http\Requests\TurnoRequest;

use Illuminate\Foundation\Http\FormRequest;

class TurnoRequest extends FormRequest
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
     *     request="TurnoRequest",
     *     description="ID del turno",
     *     required=true,
     *     @OA\JsonContent(
     *         type="object",
     *         required={"id"},
     *
     *         @OA\Property(ref="#/components/schemas/Turno/properties/id", property="id"),
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

