<?php

namespace App\Http\Requests\TurnoRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTurnoRequest extends FormRequest
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
     * * @OA\RequestBody(
     *     request="UpdateTurno",
     *     description="Turno que necesita ser actualizado",
     *     required=true,
     *     @OA\JsonContent(
     *         type="object",
     *         required={"numTurno", "fechaTurno"},
     *         @OA\Property(ref="#/components/schemas/Turno/properties/numTurno", property="numTurno"),
     *         @OA\Property(ref="#/components/schemas/Turno/properties/fechaTurno", property="fechaTurno"),
     *     )
     * )
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'numTurno'=>'required|int',
            'fechaTurno'=>'nullable|string',
        ];
    }
}
