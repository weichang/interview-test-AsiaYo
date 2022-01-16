<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Room;
use App\Models\User;
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
        // User::factory(10)->create();
         //\App\Models\Property::factory(100)->has(Room::factory()->count(5))->create();
         Order::factory(100)->create();
    }
}
