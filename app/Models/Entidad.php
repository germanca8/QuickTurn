<?php

namespace App\Models;

use App\Http\Controllers\EntidadController;
use App\Observers\EntidadObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Ramsey\Uuid\Uuid;

/**
 * App\Models\Entidad
 *
 * @OA\Schema (
 *     @OA\Property(property="id", type="string", description="Id asociado",example="670b9562-b30d-52d5-b827-655787665500"),
 *     @OA\Property(property="user_id", type="string", description="Id del usuario",example="670b9562-b30d-52d5-b827-655787665500"),
 *     @OA\Property(property="nombreEntidad", type="string", description="Nombre de la entidad", maxLength=255, example="Mercadona"),
 *     @OA\Property(property="direccionEntidad", type="string", description="Direccion de la entidad", maxLength=255, example="Calle Colon"),
 *     @OA\Property(property="horarioEntidad", type="string", description="Horario de la entidad", maxLength=255, example="9h - 21h"),
 *     @OA\Property(property="nombreFiscal", type="string", description="Nombre legal de la entidad", maxLength=255, example="Mercadona SA"),
 *     @OA\Property(property="nif", type="string", default=null, description="Documento oficial de la entidad", maxLength=255, example="11122233P"),
 *     @OA\Property(property="url", type="string", description="URL de la web de la entidad", example="https://www.mercadona.es/"),
 *     @OA\Property(property="created_at", type="string", description="Fecha de creación", example="2022-03-15T13:23:02.000000Z"),
 *     @OA\Property(property="updated_at", type="string", description="Fecha de última modificación", example="2022-03-15T13:23:02.000000Z"),
 * )
 * @property string $id
 * @property string $user_id
 * @property string $nombreEntidad
 * @property string|null $direccionEntidad
 * @property string|null $horarioEntidad
 * @property string|null $nombreFiscal
 * @property string|null $nif
 * @property string|null $url
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Seccion[] $seccion
 * @property-read int|null $seccion_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Entidad defaultSort(string $column, string $direction = 'asc')
 * @method static \Database\Factories\EntidadFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Entidad filters(?mixed $kit = null, ?\Orchid\Filters\HttpFilter $httpFilter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Entidad filtersApply(iterable $filters = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Entidad filtersApplySelection($selection)
 * @method static \Illuminate\Database\Eloquent\Builder|Entidad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Entidad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Entidad query()
 * @method static \Illuminate\Database\Eloquent\Builder|Entidad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entidad whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entidad whereDireccionEntidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entidad whereHorarioEntidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entidad whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entidad whereNif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entidad whereNombreEntidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entidad whereNombreFiscal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entidad whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entidad whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entidad whereUserId($value)
 * @mixin \Eloquent
 */

class Entidad extends Model
{
    use HasFactory, AsSource, Filterable;
    protected $keyType = 'string';
    public $incrementing = false;

    public static function boot() {
        parent::boot();

        Entidad::observe(EntidadObserver::class);

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::Uuid4()->toString();
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function seccion(): HasMany
    {
        return $this->hasMany(Seccion::class, 'seccion_id');
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
        'user_id',
        'nombreEntidad',
        'direccionEntidad',
        'horarioEntidad',
        'nombreFiscal',
        'nif',
        'url',
    ];

    protected $allowedFilters = [
        'user_id',
        'nombreEntidad',
        'direccionEntidad',
        'horarioEntidad',
        'nombreFiscal',
        'nif',
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'user_id',
        'nombreEntidad',
        'direccionEntidad',
        'horarioEntidad',
        'nombreFiscal',
        'nif',
        'updated_at',
        'created_at',
    ];
}
