<?php

namespace App\Orchid\Layouts\Entidad;

use App\Models\Entidad;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Select;

class EntidadEditInfoLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('entidad.nombreEntidad')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Nombre Entidad'))
                ->placeholder(__('Nombre de la entidad')),

            Input::make('entidad.direccionEntidad')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Direccion Entidad'))
                ->placeholder(__('Direccion de la entidad')),

            Input::make('entidad.horarioEntidad')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Horario Entidad'))
                ->placeholder(__('Horario de la entidad')),

            Input::make('entidad.nombreFiscal')
                ->type('text')
                ->max(255)
                ->title(__('Nombre Fiscal'))
                ->placeholder(__('Nombre fiscal de la entidad')),

            Input::make('entidad.nif')
                ->type('text')
                ->max(255)
                ->title(__('NIF Entidad'))
                ->placeholder(__('NIF de la entidad')),

            Input::make('entidad.url')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('URL Entidad'))
                ->placeholder(__('URL de la entidad')),

        ];
    }
}
