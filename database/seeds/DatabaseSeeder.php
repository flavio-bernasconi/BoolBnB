<?php

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
      $this ->call(UserSeeder::class)
            ->call(FlatSeeder::class)
            ->call(ServicesSeeder::class)
            ->call(DetailSeeder::class)
            ->call(AddressesSeeder::class)
            ->call(MessageSeeder::class)
            ->call(PaymentsSeeder::class);
    }
}
