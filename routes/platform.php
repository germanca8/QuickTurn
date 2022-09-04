<?php

declare(strict_types=1);

use App\Orchid\Screens\Entidad\EntidadCreateScreen;
use App\Orchid\Screens\Entidad\EntidadEditScreen;
use App\Orchid\Screens\Entidad\EntidadListScreen;
use App\Orchid\Screens\Examples\ExampleCardsScreen;
use App\Orchid\Screens\Examples\ExampleChartsScreen;
use App\Orchid\Screens\Examples\ExampleFieldsAdvancedScreen;
use App\Orchid\Screens\Examples\ExampleFieldsScreen;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use App\Orchid\Screens\Examples\ExampleScreen;
use App\Orchid\Screens\Examples\ExampleTextEditorsScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\Seccion\SeccionCreateScreen;
use App\Orchid\Screens\Seccion\SeccionEditScreen;
use App\Orchid\Screens\Seccion\SeccionListScreen;
use App\Orchid\Screens\Turno\TurnoEditScreen;
use App\Orchid\Screens\Turno\TurnoListScreen;
use App\Orchid\Screens\User\UserCreateScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', PlatformScreen::class)
    ->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.index.profile')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Profile'), route('platform.index.profile'));
    });

// Platform > System > Users
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(function (Trail $trail, $user) {
        return $trail
            ->parent('platform.systems.users')
            ->push(__('User'), route('platform.systems.users.edit', $user));
    });

// Platform > System > Users > Create
Route::screen('users/create', UserCreateScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.users')
            ->push(__('Create'), route('platform.systems.users.create'));
    });

// Platform > System > Users > User
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Users'), route('platform.systems.users'));
    });

// Platform > System > Entidads
Route::screen('entidads/{entidad}/edit', EntidadEditScreen::class)
    ->name('platform.systems.entidads.edit')
    ->breadcrumbs(function (Trail $trail, $entidad) {
        return $trail
            ->parent('platform.systems.entidads')
            ->push(__('Entidad'), route('platform.systems.entidads.edit', $entidad));
    });

// Platform > System > Entidads > Entidad
Route::screen('entidads', EntidadListScreen::class)
    ->name('platform.systems.entidads')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Entidads'), route('platform.systems.entidads'));
    });

// Platform > System > Entidads > Create
Route::screen('entidads/create', EntidadCreateScreen::class)
    ->name('platform.systems.entidads.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.entidads')
            ->push(__('Create'), route('platform.systems.entidads.create'));
    });

// Platform > System > Seccions
Route::screen('seccions/{seccion}/edit', SeccionEditScreen::class)
    ->name('platform.systems.seccions.edit')
    ->breadcrumbs(function (Trail $trail, $seccion) {
        return $trail
            ->parent('platform.systems.seccions')
            ->push(__('Seccion'), route('platform.systems.seccions.edit', $seccion));
    });

// Platform > System > Seccions > Seccion
Route::screen('seccions', SeccionListScreen::class)
    ->name('platform.systems.seccions')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Secciones'), route('platform.systems.seccions'));
    });

// Platform > System > Seccions > Create
Route::screen('seccions/create', SeccionCreateScreen::class)
    ->name('platform.systems.seccions.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.seccions')
            ->push(__('Create'), route('platform.systems.seccions.create'));
    });

// Platform > System > Turnos > Turno
Route::screen('turnos', TurnoListScreen::class)
    ->name('platform.systems.turnos')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Turnos'), route('platform.systems.turnos'));
    });

