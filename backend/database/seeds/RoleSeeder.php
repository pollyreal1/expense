<?php

use Illuminate\Database\Seeder;

use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = new Role();
        $role = $role->create([
            'name' => 'Administrator',
            'description' => 'can access all',
        ]);
    }
}
