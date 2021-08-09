<?php

namespace Database\Seeders;

use App\Repositories\UserRepository;
use Illuminate\Database\Seeder;

class AddTestUser extends Seeder
{
    const TEST_LOGIN = 'test';
    const TEST_PASWORD = 'password';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app(UserRepository::class)->create([
            'login' => self::TEST_LOGIN,
            'password' => self::TEST_PASWORD
        ]);
    }
}
