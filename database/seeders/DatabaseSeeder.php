<?php

namespace Database\Seeders;

use App\Http\Requests\EntidadRequest\EntidadRequest;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(DemoSeeder::class);
        //$this->call(EntidadSeeder::class);
        //$this->call(SeccionSeeder::class);
        //$this->call(TurnoSeeder::class);
    }
}
