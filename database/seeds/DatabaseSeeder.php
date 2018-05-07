<?php

use App\Tag;
use App\Post;
use App\User;
use App\Category;
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
        DB::table('users')->insert([
            'name' => 'Sid',
            'email' => 'forge405@gmail.com',
            'password' => bcrypt(env('SEED_PASS')),
        ]);

        $users = factory(User::class, 9)->create();

        $categories = factory(Category::class, 10)->create();

        $tags = factory(Tag::class, 20)->create();

        foreach ($users as $user) {
            $posts = factory(Post::class, 10)->create([
                'user_id' => $user->id,
                'category_id' => $categories->random()->id,
            ]);

            foreach ($posts as $post) {
                $postTags = $tags->random(3)->pluck('id');

                $post->tags()->sync($postTags);
            }
        }
    }
}
