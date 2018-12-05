<?php

use Illuminate\Database\Seeder;
use App\Dog;

class DogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dogs = factory(Dog::class, 5)->create();
    }
}
