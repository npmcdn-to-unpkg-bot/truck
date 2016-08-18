<?php

use Illuminate\Database\Seeder;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = factory(App\User::class)->create([
            'email' => 'odeleye.emmanuel@gmail.com'
        ]);
        $admin->roles()->sync([Role::firstOrCreate(['name' => 'admin'])::nameToId('admin')]);

        $driver = factory(App\User::class)->create([
            'email' => 'odeleye.emmanuel@yahoo.com'
        ]);
        $driver->roles()->sync([Role::firstOrCreate(['name' => 'driver'])::nameToId('driver')]);

        $client = factory(App\User::class)->create([
            'email' => 'odeleye.emmanuel@hotmail.com'
        ]);
        $client->roles()->sync([Role::firstOrCreate(['name' => 'client'])::nameToId('client')]);


        factory(App\User::class, 10)->create()->each(function($u) {
            $u->roles()->sync([Role::firstOrCreate(['name' => 'client'])::nameToId('client')]);
        });
    }
}
