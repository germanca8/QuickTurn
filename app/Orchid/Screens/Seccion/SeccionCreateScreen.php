<?php

namespace App\Orchid\Screens\Seccion;

use App\Models\Seccion;
use App\Orchid\Layouts\Seccion\SeccionCreateLayout;
use App\Orchid\Layouts\Seccion\SeccionEditLayout;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class SeccionCreateScreen extends Screen
{
    /**
     * @var Seccion
     */
    public $seccion;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Seccion $seccion): iterable
    {
        return [
            'seccion' => $seccion
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Crear sección';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make(__('Eliminar'))
                ->icon('trash')
                ->confirm(__('Una vez se elimine la sección todos sus datos se perderán para siempre. Antes de eliminar la sección, descarga cualquier información que desees.'))                ->method('remove')
                ->canSee($this->seccion->exists),

            Button::make(__('Guardar'))
                ->icon('check')
                ->method('save'),
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
            Layout::block(SeccionCreateLayout::class)
                ->title(__('Información de la sección'))
                ->commands(
                    Button::make(__('Guardar'))
                        ->type(Color::DEFAULT())
                        ->icon('check')
                        ->canSee($this->seccion->exists)
                        ->method('save')
                ),
        ];
    }

    /**
     * @param Seccion $seccion
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Seccion $seccion, Request $request)
    {
        $seccionData = $request->get('seccion');

        $seccion
            ->fill($seccionData)
            ->save();

        Toast::info(__('La sección se ha guardado.'));
        return redirect()->route('platform.systems.seccions');
    }

    /**
     * @param Seccion $seccion
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function remove(Seccion $seccion)
    {
        $seccion->delete();

        Toast::info(__('La sección se ha eliminado.'));
        return redirect()->route('platform.systems.seccions');
    }
}
