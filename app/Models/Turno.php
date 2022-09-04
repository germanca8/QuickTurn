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
 * App\Models\Turno
 *
 * @OA\Schema (
 *     @OA\Property(property="id", type="string", description="Id asociado",example="670b9562-b30d-52d5-b827-655787665500"),
 *     @OA\Property(property="seccion_id", type="string", description="Id de la seccion",example="670b9562-b30d-52d5-b827-655787665500"),
 *     @OA\Property(property="invitado_id", type="string", description="Id del invitado",example="670b9562-b30d-52d5-b827-655787665500"),
 *     @OA\Property(property="numTurno", type="int", description="Numero de turno", maxLength=255, example="1"),
 *     @OA\Property(property="fechaTurno", type="string", description="Fecha y hora de solicitud de turno", maxLength=52, example="2022-03-15T13:23:02.000000Z"),
 *     @OA\Property(property="created_at", type="string", description="Fecha de creación", example="2022-03-15T13:23:02.000000Z"),
 *     @OA\Property(property="updated_at", type="string", description="Fecha de última modificación", example="2022-03-15T13:23:02.000000Z"),
 * )
 * @property string $id
 * @property string $seccion_id
 * @property string $numTurno
 * @property string $fechaTurno
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Seccion $seccion
 * @method static \Illuminate\Database\Eloquent\Builder|Turno defaultSort(string $column, string $direction = 'asc')
 * @method static \Database\Factories\TurnoFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Turno filters(?mixed $kit = null, ?\Orchid\Filters\HttpFilter $httpFilter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Turno filtersApply(iterable $filters = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Turno filtersApplySelection($selection)
 * @method static \Illuminate\Database\Eloquent\Builder|Turno newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Turno newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Turno query()
 * @method static \Illuminate\Database\Eloquent\Builder|Turno whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Turno whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Turno whereFechaTurno($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Turno whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Turno whereNumTurno($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Turno whereSeccionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Turno whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Invitado|null $invitado
 * @property string $invitado_id
 * @method static \Illuminate\Database\Eloquent\Builder|Turno whereInvitadoId($value)
 */

class Turno extends Model
{
    use HasFactory, AsSource, Filterable;
    protected $keyType = 'string';
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::Uuid4()->toString();
        });
    }

    public function seccion(): BelongsTo
    {
        return $this->belongsTo(Seccion::class, 'seccion_id');
    }

    public function invitado(): BelongsTo
    {
        return $this->belongsTo(Invitado::class, 'invitado_id');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'id'=>"string",
        'seccion_id'=>"string",
        'invitado_id'=>"string",
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'numTurno',
        'fechaTurno',
    ];

    protected $allowedFilters = [
        'seccion_id',
        'invitado_id',
        'numTurno',
        'fechaTurno',
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'seccion_id',
        'invitado_id',
        'numTurno',
        'fechaTurno',
        'updated_at',
        'created_at',
    ];
}
