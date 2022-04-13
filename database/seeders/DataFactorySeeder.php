<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataFactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User::factory(10)->create();
        //Category::factory(10)->create();
        //Tag::factory(10)->create();
        //Post::factory(10)->create();
        //Comment::factory(10)->create();

        $data = [];
        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'post_id' => rand(1, 10),
                'tag_id' => rand(1, 10),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ];
        }
        DB::table('post_tag')->insert($data);
    }
}
