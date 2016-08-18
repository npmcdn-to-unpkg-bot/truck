<?php

use Illuminate\Database\Seeder;

class TrucksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Truck::class, 50)->create()->each(function($t) {
            $t->data()->save(factory(App\TruckData::class)->make());
        });
    }
}
