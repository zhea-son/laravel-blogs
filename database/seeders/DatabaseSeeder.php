<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        $users = [[
            'name' => "User1",
            'email' => "user1@gmail.com",
            'password' => bcrypt('password'),
            'phone' => "1234567890",
            'gender' => "male",
        ],
        [
            'name' => "User2",
            'email' => "user2@gmail.com",
            'password' => bcrypt('password'),
            'phone' => "1244568890",
            'gender' => "male",
        ],
        [
            'name' => "Admin",
            'email' => "admin@gmail.com",
            'password' => bcrypt('password'),
            'phone' => "1224667890",
            'gender' => "female",
            'role' => 1,
        ]
        ];

        foreach($users as $user)
            User::create($user);

        $categories = [[
            'category' => "Technology",
        ],
        [
            'category' => "Agriculture",
        ],
        [
            'category' => "Engineering",
        ],
        [
            'category' => "Medicine",
        ],
        [
            'category' => "Politics",
        ],
        [
            'category' => "Media",
        ],
        [
            'category' => "Food",
        ],
        [
            'category' => "Travel",
        ],
        [
            'category' => "Wildlife",
        ],
        [
            'category' => "Economic",
        ],
        [
            'category' => "Nature",
        ],
        [
            'category' => "Entertainment",
        ],
        [
            'category' => "Sports",
        ],
        [
            'category' => "Fashion",
        ],
        [
            'category' => "Lifestyle",
        ],];
    foreach($categories as $category)
    BlogCategory::create($category);


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
