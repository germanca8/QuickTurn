<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\User;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Password;
use Orchid\Screen\Layouts\Rows;

class ProfilePasswordLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Password::make('old_password')
                ->placeholder(__('Introduce la contraseña actual'))
                ->title(__('Contraseña actual')),

            Password::make('password')
                ->placeholder(__('Introduce la nueva contraseña'))
                ->title(__('Nueva contraseña')),

            Password::make('password_confirmation')
                ->placeholder(__('Repite la nueva contraseña'))
                ->title(__('Confirmar nueva contraseña')),
        ];
    }
}
