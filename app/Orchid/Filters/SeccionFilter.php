<?php

namespace App\Orchid\Filters;

use App\Models\Seccion;
use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filter;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Select;

class SeccionFilter extends Filter
{
    /**
     * The displayable name of the filter.
     *
     * @return string
     */
    public function name(): string
    {
        return 'Secciones';
    }

    /**
     * The array of matched parameters.
     *
     * @return array|null
     */
    public function parameters(): ?array
    {
        return ['nombSecc'];
    }

    /**
     * Apply to a given Eloquent query builder.
     *
     * @param Builder $builder
     *
     * @return Builder
     */
    public function run(Builder $builder): Builder
    {
        return $builder->whereHas('seccion', function (Builder $query) {
            $query->where('nombreSeccion', $this->request->get('nombSecc'));
        });
    }

    /**
     * @return Field[]
     */

    public function display(): array
    {
        return [
            Select::make('nombSecc')
                ->fromModel(Seccion::class, 'nombreSeccion', 'nombreSeccion')
                ->empty()
                ->value($this->request->get('nombSecc'))
                ->title(__('Seccions')),
        ];
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->name() . ': ' . Seccion::where('nombreSeccion', $this->request->get('nombSecc'))->first()->nombreSeccion;
    }
}
