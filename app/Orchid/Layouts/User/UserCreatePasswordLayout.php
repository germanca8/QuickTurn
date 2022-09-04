<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\User;

use Orchid\Platform\Models\User;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Password;
use Orchid\Screen\Layouts\Rows;

class UserCreatePasswordLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        /** @var User $user */
        $user = $this->query->get('user');

        $placeholder = $user->exists
            ? __('Dejar vacío para mantener la contraseña actual')
            : __('Introducir la nueva contraseña');

        return [
            Password::make('user.password')
                ->required()
                ->placeholder($placeholder)
                ->title(__('Contraseña')),
        ];
    }
}
