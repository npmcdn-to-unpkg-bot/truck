<?php

use Illuminate\Database\Seeder;

class TruckDatasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TruckData::class, 50)->create();
    }
}
