<?php

namespace App\Orchid\Layouts\Seccion;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class SeccionCreateLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('seccion.entidad_id')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Entidad asociada ID'))
                ->placeholder(__('Entidad asociada ID')),


            Input::make('seccion.nombreSeccion')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Nombre Seccion'))
                ->placeholder(__('nombre de las seccion')),
        ];
    }
}
