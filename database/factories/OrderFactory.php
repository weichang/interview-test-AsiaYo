<?php

namespace Database\Factories;

use App\Models\Property;
use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $p_id = Property::all()->random()->id;
        $r_id = Room::where('property_id', $p_id)->get()->random()->id;
        return [
            'user_id'     => User::all()->random()->id,
            'property_id' => $p_id,
            'room_id'     => $r_id,
            'price'       => 999,
            'created_at' =>  Carbon::parse('2021-02-16')
        ];
    }
}
