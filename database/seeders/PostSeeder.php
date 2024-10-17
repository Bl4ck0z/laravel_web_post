<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run()
    {
        Post::create([
            'title' => 'Primer Post',
            'content' => 'Este es el contenido del primer post.'
        ]);

        Post::create([
            'title' => 'Segundo Post',
            'content' => 'Este es el contenido del segundo post.'
        ]);
    }
}
