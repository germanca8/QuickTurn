<?php

declare(strict_types=1);

namespace App\Orchid\Screens\User;

use App\Orchid\Layouts\User\UserCreatePasswordLayout;
use App\Orchid\Layouts\User\UserEditLayout;
use App\Orchid\Layouts\User\UserPasswordLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Orchid\Platform\Models\User;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Ramsey\Uuid\Uuid;

class UserCreateScreen extends Screen
{
    /**
     * @var User
     */
    public $user;

    /**
     * Query data.
     *
     * @param User $user
     *
     * @return array
     */
    public function query(User $user): iterable
    {
        return [
            'user'       => $user,
            'permission' => $user->getStatusPermission(),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Crear usuario';
    }

    /**
     * @return iterable|null
     */
    public function permission(): ?iterable
    {
        return [
            'platform.systems.users',
        ];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make(__('Eliminar'))
                ->icon('trash')
                ->confirm(__('Una vez se elimine el usuario todos sus datos se perderán para siempre. Antes de eliminar el usuario, descarga cualquier información que desees.'))
                ->method('remove')
                ->canSee($this->user->exists),

            Button::make(__('Guardar'))
                ->icon('check')
                ->method('save'),
        ];
    }

    /**
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [

            Layout::block(UserEditLayout::class)
                ->title(__('Información de la cuenta'))
                ->description(__('Actualiza el email y contraseña de tu cuenta.'))
                ->commands(
                    Button::make(__('Guardar'))
                        ->type(Color::DEFAULT())
                        ->icon('check')
                        ->canSee($this->user->exists)
                        ->method('save')
                ),

            Layout::block(UserCreatePasswordLayout::class)
                ->title(__('Contraseña'))
                ->description(__('Asegúrate de que tu cuenta usa una contraseña larga y segura para tu seguridad.'))
                ->commands(
                    Button::make(__('Guardar'))
                        ->type(Color::DEFAULT())
                        ->icon('check')
                        ->canSee($this->user->exists)
                        ->method('save')
                ),
        ];
    }

    /**
     * @param User    $user
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(User $user, Request $request)
    {
        $request->validate([
            'user.email' => [
                'required',
            ],
        ]);

        $permissions = [
            'disabledUser' => [
                'platform.index' => true,
            ],
        ];
        $userData = $request->get('user');
        $userExists = User::where('email', $userData['email'])->first();

        if ($userExists !== null) {
            Toast::error(__('Este email está en uso'));
        } else {

            if ($user->exists && (string)$userData['password'] === '') {
                // When updating existing user null password means "do not change current password"
                unset($userData['password']);
            } else {
                $userData['password'] = Hash::make($userData['password']);
            }

            if ($user->exists){
                $user
                    ->fill($userData)
                    ->fill([
                        'permissions' => $permissions['disabledUser'],
                    ])
                    ->save();
            }else{
                $user = new User();
                $user->id = Uuid::Uuid4()->toString();
                $user->email = $userData["email"];
                $user->name = $userData["name"];
                $user->password = $userData["password"];
                $user->permissions = $permissions['disabledUser'];
                $user->save();
            }
            //$user->replaceRoles($request->input('user.roles'));

            Toast::info(__('User was saved.'));
        }
        return redirect()->route('platform.systems.users');
    }

    /**
     * @param User $user
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Exception
     *
     */
    public function remove(User $user)
    {
        $user->delete();

        Toast::info(__('La cuenta se ha eliminado.'));

        return redirect()->route('platform.systems.users');
    }

}
