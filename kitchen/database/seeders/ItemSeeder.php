<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $price = [10000,15000,20000,25000,30000];
      
        DB::table('items')->insert([
                                    [
                                        'name' => 'tomato',
                                        'price' => Arr::random($price),
                                        'quantity' => 5
                                    ],
                                    [
                                        'name' => 'lemon',
                                        'price' => Arr::random($price),
                                        'quantity' => 5
                                    ],
                                    [
                                        'name' => 'potato',
                                        'price' => Arr::random($price),
                                        'quantity' => 5
                                    ],
                                    [
                                        'name' => 'rice',
                                        'price' => Arr::random($price),
                                        'quantity' => 5
                                    ],
                                    [
                                        'name' => 'ketchup',
                                        'price' => Arr::random($price),
                                        'quantity' => 5
                                    ],
                                    [
                                        'name' => 'lettuce',
                                        'price' => Arr::random($price),
                                        'quantity' => 5
                                    ],
                                    [
                                        'name' => 'onion',
                                        'price' => Arr::random($price),
                                        'quantity' => 5
                                    ],
                                    [
                                        'name' => 'cheese',
                                        'price' => Arr::random($price),
                                        'quantity' => 5
                                    ],
                                    [
                                        'name' => 'meat',
                                        'price' => Arr::random($price),
                                        'quantity' => 5
                                    ],
                                    [
                                        'name' => 'chicken',
                                        'price' => Arr::random($price),
                                        'quantity' => 5
                                    ]
        ]);
    }
}
