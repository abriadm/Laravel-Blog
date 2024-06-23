<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::factory()->create([
        //     'name' => 'Admin',
        //     'username' => 'admin',
        //     'is_admin' => true,
        //     'email' => 'admin@admin.com',
        // ]);

        User::factory()->create([
            'name' => 'Atama Cahya',
            'username' => 'tama',
            'is_admin' => true,
            'email' => 'atama@admin.com',
        ]);

        User::factory(5)->create();

        Category::create([
            'name' => 'Programming',
            'slug' => 'programming',
        ]);

        Category::create([
            'name' => 'Design',
            'slug' => 'desain',
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'user-profile',
        ]);

        Category::create([
            'name' => 'JavaScript',
            'slug' => 'java-fan-base',
        ]);

        Post::factory(5)->create();
    }
}
