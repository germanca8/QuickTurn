<?php

declare(strict_types=1);

namespace App\Orchid\Filters;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filter;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Select;

class UserFilter extends Filter
{
    /**
     * The displayable name of the filter.
     *
     * @return string
     */
    public function name(): string
    {
        return 'Users';
    }

    /**
     * The array of matched parameters.
     *
     * @return array|null
     */
    public function parameters(): ?array
    {
        return ['emailUser'];
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
        return $builder->whereHas('user', function (Builder $query) {
            $query->where('email', $this->request->get('emailUser'));
        });
    }

    /**
     * @return Field[]
     */

    public function display(): array
    {
        return [
            Select::make('emailUser')
                ->fromModel(User::class, 'email', 'email')
                ->empty()
                ->value($this->request->get('emailUser'))
                ->title(__('Users')),
        ];
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->name() . ': ' . User::where('email', $this->request->get('emailUser'))->first()->email;
    }
}
