<?php

namespace App\Orchid\Layouts\Seccion;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class SeccionEditLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('seccion.nombreSeccion')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Nombre Seccion'))
                ->placeholder(__('nombre de las seccion')),
        ];
    }
}
