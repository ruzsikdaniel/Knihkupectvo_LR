<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CheckoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('deliveries')->insert([
            [
                'id' => 1,
                'method' => 'Slovenská pošta',
                'price' => 3.50
            ],
            [
                'id' => 2,
                'method' => 'Packeta',
                'price' => 2.90
            ],
            [
                'id' => 3,
                'method' => 'DPD',
                'price' => 4.20
            ],
            [
                'id' => 4,
                'method' => 'Na adresu',
                'price' => 5.00
            ]
        ]);

        DB::table('payments')->insert([
            [
                'id' => 1,
                'method' => 'Kartou online',
                'price' => 0.00
            ],
            [
                'id' => 2,
                'method' => 'Pri vyzdvihnutí',
                'price' => 1.00
            ],
            [
                'id' => 3,
                'method' => 'PayPal',
                'price' => 0.50
            ],
            [
                'id' => 4,
                'method' => 'Google Pay',
                'price' => 0.30
            ],
        ]);
    }
}
