<?php
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $faker = Faker\Factory::create();
        $address = [];

        

        for($i = 0; $i < 10; $i++) {
            $address[] = [
                'user_id' => 1,
                'name' => $faker->name,
                'address' => $faker->address,
                'city'=> $faker->city,
                'state' => $faker->state,
                'country' => $faker->country,
                'pin_code' => 636008,
                'contact_no' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('addresses')->insert($address);
    }
}
