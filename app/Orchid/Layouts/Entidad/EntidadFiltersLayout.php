<?php

namespace App\Orchid\Layouts\Entidad;

use App\Orchid\Filters\UserFilter;
use Orchid\Filters\Filter;
use Orchid\Screen\Layouts\Selection;

class EntidadFiltersLayout extends Selection
{
    /**
     * @return string[]|Filter[]
     */
    public function filters(): array
    {
        return [
            UserFilter::class,
        ];
    }
}
