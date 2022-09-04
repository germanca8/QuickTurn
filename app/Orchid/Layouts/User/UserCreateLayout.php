<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\User;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class UserCreateLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('user.name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Nombre'))
                ->placeholder(__('harry_jr')),

            Input::make('user.email')
                ->type('email')
                ->required()
                ->title(__('Email'))
                ->placeholder(__('Email')),

            Input::make('user.fullName')
                ->type('text')
                ->max(255)
                ->title(__('Nombre completo'))
                ->placeholder(__('Harry John Ray')),

            Input::make('user.dni')
                ->type('text')
                ->max(255)
                ->title(__('DNI'))
                ->placeholder(__('11223344A')),

            Input::make('user.domicilio')
                ->type('text')
                ->max(255)
                ->title(__('Domicilio'))
                ->placeholder(__('Calle Colón 93')),
        ];
    }
}
