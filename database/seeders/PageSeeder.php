<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::create([
            'name' => 'home',
            'slug' => '/',
        ]);
        Page::create([
            'name' => 'about',
            'slug' => '/about',
        ]);
        Page::create([
            'name' => 'academic',
            'slug' => '/academic',
        ]);
        Page::create([
            'name' => 'contact-us',
            'slug' => '/contact-us',
        ]);
    }
}
