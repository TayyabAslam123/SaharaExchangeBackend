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
         $this->call(IndustrySeeder::class);//industry seeders
         $this->call(MonetizationSeeder::class);//monetization seeder
         $this->call(StatusSeeder::class);//status seeder
         $this->call(UserSeeder::class);//user-(Admin) seeder
    }
}
