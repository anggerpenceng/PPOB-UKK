<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TableUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $address = [
            "address" => "jl. kita",
            "city" => "malang",
            "state" => "jawa barat",
            "postcode" => "023903",
            "country" => "Indonesia"
        ];

        DB::table('users')->insert([
            "name" => "Angger Pratama",
            "username" => "angger123",
            "password" => Hash::make('config123'),
            "nomor_kwh" => 0,
            "alamat" => json_encode($address),
            "id_role" => 1,
            "created_at" => Carbon::now()
        ]);
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 20; $i++){

            $address_fake = [
                "address" => $faker->streetName,
                "city" => $faker->city,
                "state" => $faker->state,
                "postcode" => $faker->postcode,
                "country" => $faker->country
            ];

            DB::table('users')->insert([
                "name" => $faker->name,
                "username" => $faker->userName,
                "password" => Hash::make($faker->password),
                "nomor_kwh" => $faker->randomNumber(9),
                "alamat" => json_encode($address_fake),
                "id_role" => 2,
                "created_at" => Carbon::now()
            ]);
        }
    }
}
