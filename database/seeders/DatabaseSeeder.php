<?php

namespace Database\Seeders;

//use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\UserRoleEnum;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->create([
            'name' => 'Yuriy',
            'email' => 'admin@admin.com',
            'password' => '12345678',
            'role' => UserRoleEnum::ADMIN->value
        ]);

        User::query()->create([
            'name' => 'Yuriy',
            'email' => 'user@user.com',
            'password' => '12345678',
            'role' => UserRoleEnum::USER->value
        ]);

        User::factory(10)->create();


        $this->call([
            CategorySeeder::class,
            PostSeeder::class,
            TagSeeder::class,
            SubscriptionSeeder::class
        ]);

    }
}


