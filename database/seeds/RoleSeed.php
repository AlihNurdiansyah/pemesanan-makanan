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
            
            ['id' => 1, 'title' => 'Administrator (bisa membuat account user lain)',],
            ['id' => 2, 'title' => 'Pengguna Biasa',],

        ];

        foreach ($items as $item) {
            \App\Role::create($item);
        }
    }
}
