<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Ramsey\Uuid\Uuid;

/**
 * App\Models\Invitado
 *
 * * @OA\Schema (
 *
 * @OA\Property (property="id", type="string", description="Id asociado",example="670b9562-b30d-52d5-b827-655787665500"),
 *     @OA\Property(property="created_at", type="string", description="Fecha de creación", example="2022-03-15T13:23:02.000000Z"),
 *     @OA\Property(property="updated_at", type="string", description="Fecha de última modificación", example="2022-03-15T13:23:02.000000Z"),
 * )
 * @property int $id
 * @property string $nombre
 * @property mixed|null $permissions
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\InvitadoFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitado newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invitado newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invitado query()
 * @method static \Illuminate\Database\Eloquent\Builder|Invitado whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitado whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitado whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitado wherePermissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitado whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitado whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $email
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Turno[] $turno
 * @property-read int|null $turno_count
 * @method static \Illuminate\Database\Eloquent\Builder|Invitado defaultSort(string $column, string $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Invitado filters(?mixed $kit = null, ?\Orchid\Filters\HttpFilter $httpFilter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitado filtersApply(iterable $filters = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Invitado filtersApplySelection($selection)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitado whereEmail($value)
 */
class Invitado extends Model
{
    use HasApiTokens, HasFactory, Notifiable, AsSource, Filterable;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table="invitados";

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::Uuid4()->toString();
        });
    }

    public function turno(): HasMany
    {
        return $this->HasMany(Turno::class, 'turno_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'=>"string",
    ];

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'updated_at',
        'created_at',
    ];
}
