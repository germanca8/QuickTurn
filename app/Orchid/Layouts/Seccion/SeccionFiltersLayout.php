<?php

namespace App\Orchid\Layouts\Seccion;

use App\Orchid\Filters\EntidadFilter;
use Orchid\Filters\Filter;
use Orchid\Screen\Layouts\Selection;

class SeccionFiltersLayout extends Selection
{
    /**
     * @return string[]|Filter[]
     */
    public function filters(): array
    {
        return [
            EntidadFilter::class,
        ];
    }
}
