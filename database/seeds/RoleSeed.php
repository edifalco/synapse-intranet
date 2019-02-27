<?php

use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'Administrator (can create other users)',],
            ['id' => 3, 'title' => 'Finance',],
            ['id' => 4, 'title' => 'PM',],
            ['id' => 5, 'title' => 'PA',],

        ];

        foreach ($items as $item) {
            \App\Role::create($item);
        }
    }
}
