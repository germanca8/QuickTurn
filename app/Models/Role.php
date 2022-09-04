<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Ramsey\Uuid\Uuid;

/**
 * App\Models\Role
 *
 * @property string $id
 * @property string $slug
 * @property string $name
 * @property mixed|null $permissions
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Role defaultSort(string $column, string $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Role filters(?mixed $kit = null, ?\Orchid\Filters\HttpFilter $httpFilter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Role filtersApply(iterable $filters = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Role filtersApplySelection($selection)
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role wherePermissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Role extends Model
{
    use HasFactory, AsSource, Filterable;
    protected $keyType = 'string';
    public $incrementing = false;

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::Uuid4()->toString();
        });
    }

    protected $casts = [
        'id'                =>"string",
    ];
}
