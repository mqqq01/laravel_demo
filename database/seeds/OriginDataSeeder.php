<?php

use Illuminate\Database\Seeder;

class OriginDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\OriginData::class, 50)->create();
    }
}
