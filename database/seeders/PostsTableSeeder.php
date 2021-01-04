<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::create([
            'name' => 'Marketing'
        ]);
        
        $author1 = User::create([
            'name' => 'John Doe',
            'email' => 'jon@doe.com',
            'password' => Hash::make('password')
        ]);

        $author2 = User::create([
            'name' => 'Jane Doe',
            'email' => 'jane@doe.com',
            'password' => Hash::make('password')
        ]);

        $author3 = User::create([
            'name' => 'Nimal Doe',
            'email' => 'nimal@doe.com',
            'password' => Hash::make('password')
        ]);

        $category2 = Category::create([
            'name' => 'Partners'
        ]);

        $category3 = Category::create([
            'name' => 'Superhero'
        ]);

        $post1 = $author1->posts()->create([
            'title' => 'Lorem Ipsum',
            'description' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
            'content' => 'There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain',
            'category_id' => $category1->id,
            'image' => 'posts/6.jpg',
            'user_id' => $author1->id
        ]);

        $post2 = $author2->posts()->create([
            'title' => '8888 Cummings Vista Apt',
            'description' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
            'content' => 'There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain',
            'category_id' => $category2->id,
            'image' => 'posts/7.jpg'
        ]);

        $post3 = $author3->posts()->create([
            'title' => 'Falkland Islands (Malvinas)',
            'description' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
            'content' => 'There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain',
            'category_id' => $category3->id,
            'image' => 'posts/8.jpg'
        ]);

        $post4 = $author2->posts()->create([
            'title' => 'Monitored regional contingency',
            'description' => 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit',
            'content' => 'There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain',
            'category_id' => $category2->id,
            'image' => 'posts/9.jpg'
        ]);

        $tag1 = Tag::create([
            'name' => 'job'
        ]);

        $tag2 = Tag::create([
            'name' => 'customer'
        ]);

        $tag3 = Tag::create([
            'name' => 'record'
        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag2->id, $tag3->id]);
        $post3->tags()->attach([$tag1->id, $tag3->id]);
    }
}
