<?php

use Illuminate\Database\Seeder;
use App\Service;
use App\Flat;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Service::class, 6)
                -> create()
                -> each(function($service) {

                $flats = Flat::inRandomOrder()->take(rand(0, 400))->get();

                $service -> flats() -> attach($flats);

                $service -> save();
        });
    }
}
