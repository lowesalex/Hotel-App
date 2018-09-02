<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('clients')->insert(
            [
                'title' => 'mr',
                'name' => 'John',
                'last_name' => 'Doe',
                'address' => 'Street 123',
                'zip_code' => '06040',
                'city' => 'Tulsa',
                'state' => 'OK',
                'email' => 'john@example.com',
            ]
        );

        DB::table('clients')->insert(
            [
                'title' => 'mrs',
                'name' => 'Jane',
                'last_name' => 'Doe',
                'address' => 'Another Street 456',
                'zip_code' => '13000',
                'city' => 'Los Angeles',
                'state' => 'CA',
                'email' => 'jane@example.com',
            ]
        );
    }
}
