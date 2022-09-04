<?php

namespace App\Orchid\Filters;

use App\Models\Entidad;
use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filter;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Select;

class EntidadFilter extends Filter
{
    /**
     * The displayable name of the filter.
     *
     * @return string
     */
    public function name(): string
    {
        return 'Entidades';
    }

    /**
     * The array of matched parameters.
     *
     * @return array|null
     */
    public function parameters(): ?array
    {
        return ['nomEnt'];
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
        return $builder->whereHas('entidad', function (Builder $query) {
            $query->where('nombreEntidad', $this->request->get('nomEnt'));
        });
    }

    /**
     * @return Field[]
     */

    public function display(): array
    {
        return [
            Select::make('nomEnt')
                ->fromModel(Entidad::class, 'nombreEntidad', 'nombreEntidad')
                ->empty()
                ->value($this->request->get('nomEnt'))
                ->title(__('Entidads')),
        ];
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->name() . ': ' . Entidad::where('nombreEntidad', $this->request->get('nomEnt'))->first()->nombreEntidad;
    }
}
