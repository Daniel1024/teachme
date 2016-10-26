<?php

use TeachMe\Entities\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createAdmin();
        $this->createUsers(49);
    }


    private function createAdmin()
    {
        factory(User::class)->create([
            'name' => 'Daniel López',
            'email' => 'daniel@admin.com',
        ]);
    }


    private function createUsers($int)
    {
        factory(User::class)->times($int)->create();
    }
}
