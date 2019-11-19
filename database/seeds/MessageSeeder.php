<?php

use Illuminate\Database\Seeder;
use App\Message;
use App\Flat;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Message::class, 200)
        //         -> make()
        //         -> each(function($message) {
        //
        //       $flat = Flat::inRandomOrder() -> first();
        //       $message -> flat() -> associate($flat);
        //
        //       $message -> save();
        //
        //   });
    }
}
