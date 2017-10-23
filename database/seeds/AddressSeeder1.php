<?php

use Database\traits\TruncateTable;
use Database\traits\DisableForeignKeys;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $this->disableForeignKeys();
        $this->truncate('users');

        $address = [];

        

        for($i = 0; $i < 10; $i++) {
            $address[] = [
                'user_id' => $i,
                'name' => $faker->name,
                'address' => $faker->address,
                'city'=> $faker->city,
                'state' => $faker->state,
                'country' => $faker->country,
                'pin_code' => $faker->postcode,
                'contact_no' => $faker->phoneNumber,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('addresses')->insert($address);

        $this->enableForeignKeys();
    }
}
