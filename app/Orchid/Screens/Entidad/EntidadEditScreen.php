<?php

namespace App\Orchid\Screens\Entidad;

use App\Models\Seccion;
use App\Models\Entidad;
use App\Orchid\Layouts\Entidad\EntidadEditInfoLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class EntidadEditScreen extends Screen
{
    /**
     * @var Entidad
     */
    public $entidad;

    /**
     * Query data.
     *
     * @param Entidad $entidad
     *
     * @return array
     */
    public function query(Entidad $entidad): iterable
    {
        return [
            'entidad' => $entidad
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Editar entidad';
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make(__('Eliminar'))
                ->icon('trash')
                ->confirm(__('Una vez se elimine la entidad todos sus datos se perderán para siempre. Antes de eliminar la entidad, descarga cualquier información que desees.'))
                ->method('remove')
                ->canSee($this->entidad->exists),

            Button::make(__('Guardar'))
                ->icon('check')
                ->method('save'),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::block(EntidadEditInfoLayout::class)
                ->title(__('Información de la entidad'))
                ->commands(
                    Button::make(__('Guardar'))
                        ->type(Color::DEFAULT())
                        ->icon('check')
                        ->canSee($this->entidad->exists)
                        ->method('save')
                ),
        ];
    }

    /**
     * @param Entidad $entidad
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Entidad $entidad, Request $request)
    {
        $request->validate([
            'entidad.nombreEntidad' => [
                'required',
                Rule::unique(Entidad::class, 'nombreEntidad')->ignore($entidad),
            ]
        ]);

        $entidadData = $request->get('entidad');

        $entidad
            ->fill($entidadData)
            ->save();

        Toast::info(__('La entidad se ha guardado.'));

        return redirect()->route('platform.systems.entidads');
    }

    /**
     * @param Entidad $entidad
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function remove(Entidad $entidad)
    {

        $entidad->delete();

        Toast::info(__('La entidad se ha eliminado.'));
        return redirect()->route('platform.systems.entidads');
    }
}
