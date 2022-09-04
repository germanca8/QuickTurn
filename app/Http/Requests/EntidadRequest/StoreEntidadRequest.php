<?php

namespace App\Http\Requests\EntidadRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntidadRequest extends FormRequest
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
     *     request="StoreEntidad",
     *     description="Entidad que necesita ser creada",
     *     required=true,
     *     @OA\JsonContent(
     *         type="object",
     *         required={"user_id","nombreEntidad"},
     *         @OA\Property(ref="#/components/schemas/Entidad/properties/user_id", property="user_id"),
     *         @OA\Property(ref="#/components/schemas/Entidad/properties/nombreEntidad", property="nombreEntidad"),
     *         @OA\Property(ref="#/components/schemas/Entidad/properties/direccionEntidad", property="direccionEntidad"),
     *         @OA\Property(ref="#/components/schemas/Entidad/properties/horarioEntidad", property="horarioEntidad"),
     *         @OA\Property(ref="#/components/schemas/Entidad/properties/nombreFiscal", property="nombreFiscal"),
     *         @OA\Property(ref="#/components/schemas/Entidad/properties/nif", property="nif"),
     *         @OA\Property(ref="#/components/schemas/Entidad/properties/url", property="url"),
     *     )
     * )
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id'=>'required|string',
            'nombreEntidad'=>'required|string',
            'direccionEntidad'=>'nullable|string',
            'horarioEntidad'=>'nullable|string',
            'nombreFiscal'=>'nullable|string',
            'nif'=>'nullable|string',
            'url'=>'nullable|string',
        ];
    }
}
