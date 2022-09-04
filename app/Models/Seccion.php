<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Ramsey\Uuid\Uuid;

/**
 * App\Models\Seccion
 *
 * @OA\Schema (
 *     @OA\Property(property="id", type="string", description="Id asociado",example="670b9562-b30d-52d5-b827-655787665500"),
 *     @OA\Property(property="entidad_id", type="string", description="Id de la entidad",example="670b9562-b30d-52d5-b827-655787665500"),
 *     @OA\Property(property="nombreSeccion", type="string", description="Nombre de la seccion", maxLength=255, example="Mercadona"),
 *     @OA\Property(property="turnoActual", type="integer", description="Numero del turno actual", maxLength=52, example="363"),
 *     @OA\Property(property="ultimoTurno", type="integer", description="Numero del ultimo turno", maxLength=52, example="363"),
 *     @OA\Property(property="created_at", type="string", description="Fecha de creación", example="2022-03-15T13:23:02.000000Z"),
 *     @OA\Property(property="updated_at", type="string", description="Fecha de última modificación", example="2022-03-15T13:23:02.000000Z"),
 * )
 * @property string $id
 * @property string $entidad_id
 * @property string $nombreSeccion
 * @property integer $turnoActual
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Entidad $entidad
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Turno[] $turno
 * @property-read int|null $turno_count
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion defaultSort(string $column, string $direction = 'asc')
 * @method static \Database\Factories\SeccionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion filters(?mixed $kit = null, ?\Orchid\Filters\HttpFilter $httpFilter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion filtersApply(iterable $filters = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion filtersApplySelection($selection)
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion query()
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion whereEntidadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion whereNombreSeccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion whereTurnoActual($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $ultimoTurno
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion whereUltimoTurno($value)
 */

class Seccion extends Model
{
    use HasFactory, AsSource, Filterable;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table='seccions';

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::Uuid4()->toString();
        });
    }

    public function entidad(): BelongsTo
    {
        return $this->belongsTo(Entidad::class, 'entidad_id');
    }

    public function turno(): HasMany
    {
        return $this->hasMany(Turno::class, 'turno_id');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'id'=>"string",
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'entidad_id',
        'nombreSeccion',
        'turnoActual',
    ];

    protected $allowedFilters = [
        'entidad_id',
        'nombreSeccion',
        'turnoActual',
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'entidad_id',
        'nombreSeccion',
        'turnoActual',
        'updated_at',
        'created_at',
    ];
}
