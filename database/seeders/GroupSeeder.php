<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i =0 ; $i<10; $i++){
            Group::create([
                'number'=>rand(20000,99999)
                ]);
        }
    }
}
