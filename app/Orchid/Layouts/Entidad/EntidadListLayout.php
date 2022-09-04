<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Entidad;

use App\Models\Entidad;
use App\Models\User;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class EntidadListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'entidads';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('nombreEntidad', __('Nombre de la entidad'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (Entidad $entidad) {
                    return $entidad->nombreEntidad;
                }),

            TD::make('direccionEntidad', __('Dirección'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (Entidad $entidad) {
                    return $entidad->direccionEntidad;
                }),

            TD::make('horarioEntidad', __('Horario'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(function (Entidad $entidad) {
                    return $entidad->horarioEntidad;
                }),

            TD::make('updated_at', __('Última edición'))
                ->sort()
                ->render(function (Entidad $entidad) {
                    return $entidad->updated_at->toDateTimeString();
                }),

            TD::make('ID', __('Identificador'))
                ->render(function (Entidad $entidad) {
                    return $entidad->id;
                }),

            TD::make(__('Acciones'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Entidad $entidad) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([

                            Link::make(__('Editar'))
                                ->route('platform.systems.entidads.edit', $entidad->id)
                                ->icon('pencil'),

                            Button::make(__('Eliminar'))
                                ->icon('trash')
                                ->confirm(__('Una vez se elimine la entidad todos sus datos se perderán para siempre. Antes de eliminar la entidad, descarga cualquier información que desees.'))
                                ->method('remove', [
                                    'id' => $entidad->id,
                                ]),
                        ]);
                }),

        ];
    }
}
