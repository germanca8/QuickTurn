<?php

namespace App\Http\Requests\SeccionRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSeccionRequest extends FormRequest
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
     *     request="UpdateSeccion",
     *     description="Seccion que necesita ser actualizada",
     *     required=true,
     *     @OA\JsonContent(
     *         type="object",
     *         required={"nombreSeccion"},
     *         @OA\Property(ref="#/components/schemas/Seccion/properties/nombreSeccion", property="nombreSeccion"),
     *         @OA\Property(ref="#/components/schemas/Seccion/properties/turnoActual", property="turnoActual"),
     *         @OA\Property(ref="#/components/schemas/Seccion/properties/ultimoTurno", property="ultimoTurno"),
     *     )
     * )
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombreSeccion'=>'required|string',
            'turnoActual'=>'nullable|int',
            'ultimoTurno'=>'nullable|int',
        ];
    }
}
