<?php

namespace App\Orchid\Layouts\Turno;

use App\Models\Entidad;
use App\Models\Seccion;
use App\Models\Turno;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class TurnoListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'turnos';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [

            TD::make('nombreEntidad', __('Entidad'))
                ->cantHide()
                ->render(function (Turno $turno) {
                    $seccion = Seccion::whereId($turno->seccion_id)->firstOrFail();
                    $entidad = Entidad::whereId($seccion->entidad_id)->firstOrFail();
                    return $entidad->nombreEntidad;
                }),

            TD::make('numTurno', __('Número de turno'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (Turno $turno) {
                    return $turno->numTurno;
                }),

            TD::make('fechaTurno', __('Fecha del turno'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (Turno $turno) {
                    return $turno->fechaTurno;
                }),

            TD::make('updated_at', __('Última edición'))
                ->sort()
                ->render(function (Turno $turno) {
                    return $turno->updated_at->toDateTimeString();
                }),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Turno $turno) {
                    return
                        Button::make(__('Eliminar'))
                            ->icon('trash')
                            ->confirm(__('Una vez se elimine el turno todos sus datos se perderán para siempre. Antes de eliminar el turno, descarga cualquier información que desees.'))
                            ->method('remove', [
                                'id' => $turno->id,
                            ]);
                }),

        ];
    }
}
