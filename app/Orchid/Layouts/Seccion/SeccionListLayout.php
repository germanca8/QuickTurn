<?php

namespace App\Orchid\Layouts\Seccion;

use App\Models\Seccion;
use App\Models\Entidad;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class SeccionListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'seccions';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('nombreSeccion', __('Nombre de la sección'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (Seccion $seccion) {
                    return $seccion->nombreSeccion;
                }),

            TD::make('turnoActual', __('Turno actual'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (Seccion $seccion) {
                    return $seccion->turnoActual;
                }),

            TD::make('ultimoTurno', __('Último turno solicitado'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (Seccion $seccion) {
                    return $seccion->ultimoTurno;
                }),

            TD::make('updated_at', __('Última edición'))
                ->sort()
                ->render(function (Seccion $seccion) {
                    return $seccion->updated_at->toDateTimeString();
                }),

            TD::make('ID', __('Identificador'))
                ->render(function (Seccion $seccion) {
                    return $seccion->id;
                }),

            TD::make(__('Acciones'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Seccion $seccion) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([

                            Link::make(__('Editar'))
                                ->route('platform.systems.seccions.edit', $seccion->id)
                                ->icon('pencil'),

                            Button::make(__('Eliminar'))
                                ->icon('trash')
                                ->confirm(__('Una vez se elimine la sección todos sus datos se perderán para siempre. Antes de eliminar la sección, descarga cualquier información que desees.'))
                                ->method('remove', [
                                    'id' => $seccion->id,
                                ]),

                            Button::make(__('Restaurar sección'))
                                ->icon('refresh')
                                ->confirm(__('Una vez se restaure la sección todos sus datos se perderán.'))
                                ->method('removeAll', [
                                    'id' => $seccion->id,
                                ]),
                        ]);
                }),

        ];
    }
}
