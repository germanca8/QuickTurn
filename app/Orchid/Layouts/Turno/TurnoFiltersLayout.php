<?php

namespace App\Orchid\Layouts\Turno;

use App\Orchid\Filters\EntidadFilter;
use App\Orchid\Filters\EntidadTurnoFilter;
use App\Orchid\Filters\SeccionFilter;
use Orchid\Filters\Filter;
use Orchid\Screen\Layouts\Selection;

class TurnoFiltersLayout extends Selection
{
    /**
     * @return string[]|Filter[]
     */
    public function filters(): array
    {
        return [
            SeccionFilter::class,
        ];
    }
}
