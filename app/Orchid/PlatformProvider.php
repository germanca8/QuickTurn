<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * @return Menu[]
     */
    public function registerMainMenu(): array
    {
        return [
            Menu::make(__('Usuarios'))
                ->icon('user')
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->title(__('Elementos')),

            Menu::make(__('Entidades'))
                ->icon('building')
                ->route('platform.systems.entidads')
                ->permission('platform.systems.entidads'),

            Menu::make(__('Secciones'))
                ->icon('tag')
                ->route('platform.systems.seccions')
                ->permission('platform.systems.seccions'),

            Menu::make(__('Turnos'))
                ->icon('bell')
                ->route('platform.systems.turnos')
                ->permission('platform.systems.turnos'),
        ];
    }

    /**
     * @return Menu[]
     */
    public function registerProfileMenu(): array
    {
        return [
            Menu::make('Profile')
                ->route('platform.index.profile')
                ->permission('platform.index.profile')
                ->icon('user'),
        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions(): array
    {
        return [
            ItemPermission::group(__('Index'))
                ->addPermission('platform.index.profile', __('Index')),

            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.users', __('Users'))
                ->addPermission('platform.systems.entidads', __('Entidads'))
                ->addPermission('platform.systems.seccions', __('Seccions'))
                ->addPermission('platform.systems.turnos', __('Turnos'))
        ];
    }
}
