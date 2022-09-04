<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Entidad;

use App\Models\Entidad;
use App\Models\User;
use App\Orchid\Filters\UserFilter;
use App\Orchid\Layouts\Entidad\EntidadFiltersLayout;
use App\Orchid\Layouts\Entidad\EntidadListLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class EntidadListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'entidads' => Entidad::with('user')
                ->filters()
                ->filtersApplySelection(EntidadFiltersLayout::class)
                ->defaultSort('nombreEntidad', 'asc')
                ->paginate(10),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Entidades';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Todas las entidades registradas';
    }

    /**
     * @return iterable|null
     */
    public function permission(): ?iterable
    {
        return [
            'platform.systems.entidads',
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make(__('Add'))
                ->icon('plus')
                ->route('platform.systems.entidads.create')
        ];
    }

    /**
     * Views.
     *
     * @return string[]|\Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            EntidadFiltersLayout::class,
            EntidadListLayout::class
        ];
    }

    /**
     * @param Request $request
     */
    public function remove(Request $request): void
    {
        Entidad::findOrFail($request->get('id'))->delete();

        Toast::info(__('La entidad se ha eliminado.'));
    }

}
