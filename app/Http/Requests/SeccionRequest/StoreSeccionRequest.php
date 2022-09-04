<?php

namespace App\Http\Requests\SeccionRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreSeccionRequest extends FormRequest
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
     *     request="StoreSeccion",
     *     description="Seccion que necesita ser creada",
     *     required=true,
     *     @OA\JsonContent(
     *         type="object",
     *         required={"entidad_id","nombreSeccion"},
     *         @OA\Property(ref="#/components/schemas/Seccion/properties/entidad_id", property="entidad_id"),
     *         @OA\Property(ref="#/components/schemas/Seccion/properties/nombreSeccion", property="nombreSeccion"),
     *         @OA\Property(ref="#/components/schemas/Seccion/properties/turnoActual", property="turnoActual"),
     *         @OA\Property(ref="#/components/schemas/Seccion/properties/ultimoTurno", property="ultimoTurno"),
     *     )
     * )
     *
     * @return array
     */
    public function rules()
    {
        return [
            'entidad_id'=>'required|string',
            'nombreSeccion'=>'required|string',
            'turnoActual'=>'nullable|int',
            'ultimoTurno'=>'nullable|int',
        ];
    }
}
