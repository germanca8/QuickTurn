<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'enabledUser'   => [
                'platform.index'                            => true,
                'platform.index.profile'                    => true,
                'platform.systems.users'                    => true,
                'platform.systems.entidads'                 => true,
                'platform.systems.seccions'                 => true,
                'platform.systems.turnos'                   => true,
                'platform.systems.attachment'               => true,
            ],
            'disabledUser'   => [
                'platform.index'                            => true,
                'platform.index.profile'                    => true,
            ],
        ];

        $admin = new User();
        $admin->name = 'superadmin';
        $admin->email = 'superadmin@quickturn.com';
        $admin->password = bcrypt('superadmin');
        $admin->permissions = $permissions['enabledUser'];
        $admin->save();

        $user = new User();
        $user->name = 'meme';
        $user->email = 'me@me.com';
        $user->password = bcrypt('password');
        $user->permissions = $permissions['enabledUser'];
        $user->save();

    }
}
