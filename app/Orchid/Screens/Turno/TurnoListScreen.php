<?php

namespace App\Orchid\Screens\Turno;

use App\Models\Turno;
use App\Orchid\Layouts\Turno\TurnoFiltersLayout;
use App\Orchid\Layouts\Turno\TurnoListLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class TurnoListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'turnos' => Turno::with('seccion')
                ->filters()
                ->filtersApplySelection(TurnoFiltersLayout::class)
                ->defaultSort('numTurno', 'asc')
                ->paginate(10)
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Turnos';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Todas los turnos registrados';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make(__('Export to csv'))
                ->icon('arrow-down-circle')
                ->route('platform.systems.turnos.export')];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            TurnoFiltersLayout::class,
            TurnoListLayout::class
        ];
    }

    /**
     * @param Request $request
     */
    public function remove(Request $request): void
    {
        $turno = Turno::findOrFail($request->get('id'));

        $turno->delete();

        Toast::info(__('El turno se ha eliminado.'));
    }
}
