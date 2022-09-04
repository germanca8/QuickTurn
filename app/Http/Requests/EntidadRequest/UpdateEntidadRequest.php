<?php

namespace App\Http\Requests\EntidadRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEntidadRequest extends FormRequest
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
     *     request="UpdateEntidad",
     *     description="Entidad que necesita ser actualizada",
     *     required=true,
     *     @OA\JsonContent(
     *         type="object",
     *         required={"nombreEntidad"},
     *         @OA\Property(ref="#/components/schemas/Entidad/properties/nombreEntidad", property="nombreEntidad"),
     *         @OA\Property(ref="#/components/schemas/Entidad/properties/direccionEntidad", property="direccionEntidad"),
     *         @OA\Property(ref="#/components/schemas/Entidad/properties/horarioEntidad", property="horarioEntidad"),
     *         @OA\Property(ref="#/components/schemas/Entidad/properties/nombreFiscal", property="nombreFiscal"),
     *         @OA\Property(ref="#/components/schemas/Entidad/properties/nif", property="nif"),
     *         @OA\Property(ref="#/components/schemas/Entidad/properties/url", property="url"),
     *     )
     * )
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombreEntidad'=>'required|string',
            'direccionEntidad'=>'nullable|string',
            'horarioEntidad'=>'nullable|string',
            'nombreFiscal'=>'nullable|string',
            'nif'=>'nullable|string',
            'url'=>'nullable|string',
        ];
    }
}
