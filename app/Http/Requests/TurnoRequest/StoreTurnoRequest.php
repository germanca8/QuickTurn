<?php

namespace App\Http\Requests\TurnoRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreTurnoRequest extends FormRequest
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
     *
     * Get the validation rules that apply to the request.
     * @OA\RequestBody(
     *     request="StoreTurno",
     *     description="Turno que necesita ser creado",
     *     required=true,
     *     @OA\JsonContent(
     *         type="object",
     *         required={"seccion_id","invitado_id","numTurno","fechaTurno"},
     *         @OA\Property(ref="#/components/schemas/Turno/properties/seccion_id", property="seccion_id"),
     *         @OA\Property(ref="#/components/schemas/Turno/properties/invitado_id", property="invitado_id"),
     *         @OA\Property(ref="#/components/schemas/Turno/properties/numTurno", property="numTurno"),
     *         @OA\Property(ref="#/components/schemas/Turno/properties/fechaTurno", property="fechaTurno"),
     *     )
     * )
     *
     * @return array
     */
    public function rules()
    {
        return [
            'seccion_id'=>'required|string',
            'invitado_id'=>'required|string',
            'numTurno'=>'required|int',
            'fechaTurno'=>'required|string',
        ];
    }
}
