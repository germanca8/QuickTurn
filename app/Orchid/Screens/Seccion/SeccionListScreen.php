<?php

namespace App\Orchid\Screens\Seccion;

use App\Models\Seccion;
use App\Orchid\Layouts\Seccion\SeccionFiltersLayout;
use App\Orchid\Layouts\Seccion\SeccionListLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class SeccionListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'seccions' => Seccion::with('entidad')
                ->filters()
                ->filtersApplySelection(SeccionFiltersLayout::class)
                ->defaultSort('nombreSeccion', 'asc')
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
        return 'Secciones';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Todas las secciones registradas';
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
                ->route('platform.systems.seccions.create')
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            SeccionFiltersLayout::class,
            SeccionListLayout::class
        ];
    }

    /**
     * @param Request $request
     */
    public function remove(Request $request): void
    {
        Seccion::findOrFail($request->get('id'))->delete();

        Toast::info(__('La sección se ha eliminado.'));
    }

    /**
     * @param Request $request
     */
    public function removeAll(Request $request): void
    {
        $seccion =  Seccion::findOrFail($request->get('id'));

        DB::table('turnos')->where('seccion_id', '=', $seccion->id)->delete();

        $seccion->turnoActual = 0;
        $seccion->ultimoTurno = 0;
        $seccion->save();

        Toast::info(__('La sección se ha restaurado.'));
    }
}
