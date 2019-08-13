<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $User = new User();
        $User->create([
            'name' => 'John Smith',
            'email' => 'jsmith@sample.com',
            'password' => 'secret',
            'role_id' => 1,
        ]);

    }
}
