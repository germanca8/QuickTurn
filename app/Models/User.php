<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Orchid\Filters\Filterable;
use Orchid\Platform\Models\User as Authenticatable;
use Orchid\Screen\AsSource;
use Ramsey\Uuid\Uuid;

/**
 * App\Models\User
 *
 * @OA\Schema (
 *     @OA\Property(property="id", type="string", description="Id asociado",example="670b9562-b30d-52d5-b827-655787665500"),
 *     @OA\Property(property="name", type="string", description="Nombre de usuario", maxLength=255, example="pepe32"),
 *     @OA\Property(property="fullName", type="string", description="Nombre completo", maxLength=255, example="Pepe Casas Ortiz"),
 *     @OA\Property(property="dni", type="string", description="Documento de identidad", maxLength=255, example="11223344A"),
 *     @OA\Property(property="telefono", type="string", description="Numero de telefono", maxLength=255, example="654781923"),
 *     @OA\Property(property="domicilio", type="string", description="Direccion habitual", maxLength=255, example="Calle Gran Via"),
 *     @OA\Property(property="email", type="string", default=null, description="Email del usuario", maxLength=255, example="me@me.com"),
 *     @OA\Property(property="email_verified_at",type="string", default=null, description="Fecha de verificación del email", example="2022-03-15T13:23:02.000000Z"),
 *     @OA\Property(property="password", type="string", description="Contraseña", example="password"),
 *     @OA\Property(property="created_at", type="string", description="Fecha de creación", example="2022-03-15T13:23:02.000000Z"),
 *     @OA\Property(property="updated_at", type="string", description="Fecha de última modificación", example="2022-03-15T13:23:02.000000Z"),
 * )
 * @property string $id
 * @property string $name
 * @property string|null $fullName
 * @property string|null $dni
 * @property string|null $telefono
 * @property string|null $domicilio
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property array|null $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Entidad[] $entidad
 * @property-read int|null $entidad_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Orchid\Platform\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|User averageByDays(string $value, $startDate = null, $stopDate = null, ?string $dateColumn = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User byAccess(string $permitWithoutWildcard)
 * @method static \Illuminate\Database\Eloquent\Builder|User byAnyAccess($permitsWithoutWildcard)
 * @method static \Illuminate\Database\Eloquent\Builder|User countByDays($startDate = null, $stopDate = null, ?string $dateColumn = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User countForGroup(string $groupColumn)
 * @method static \Illuminate\Database\Eloquent\Builder|User defaultSort(string $column, string $direction = 'asc')
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User filters(?mixed $kit = null, ?\Orchid\Filters\HttpFilter $httpFilter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User filtersApply(iterable $filters = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User filtersApplySelection($selection)
 * @method static \Illuminate\Database\Eloquent\Builder|User maxByDays(string $value, $startDate = null, $stopDate = null, ?string $dateColumn = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User minByDays(string $value, $startDate = null, $stopDate = null, ?string $dateColumn = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User sumByDays(string $value, $startDate = null, $stopDate = null, ?string $dateColumn = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User valuesByDays(string $value, $startDate = null, $stopDate = null, string $dateColumn = 'created_at')
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDomicilio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePermissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTelefono($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, AsSource, Filterable;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table="users";

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::Uuid4()->toString();
        });
    }

    public function entidad(): HasMany
    {
        return $this->HasMany(Entidad::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'fullName',
        'dni',
        'telefono',
        'domicilio',
        'email',
        'password',
        'permissions',
        'status_activated_at'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'permissions',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'=>"string",
        'permissions'          => 'array',
        'email_verified_at'    => 'datetime',
    ];

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
        'name',
        'fullName',
        'dni',
        'telefono',
        'domicilio',
        'email',
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'name',
        'fullName',
        'dni',
        'telefono',
        'domicilio',
        'email',
        'updated_at',
        'created_at',
    ];
}
