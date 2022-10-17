<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{

    private function getSeederData()
    {
        return [
            [
                'id_user'      => 1,
                'id_movie'     => 1,
                'text_comment' => 'Хороший фильм'
            ],
            [
                'id_user'      => 1,
                'id_movie'     => 2,
                'text_comment' => 'Да, мне понравилось'
            ],
            [
                'id_user'      => 1,
                'id_movie'     => 3,
                'text_comment' => 'Один из лучших фильмов'
            ],
            [
                'id_user'      => 1,
                'id_movie'     => 4,
                'text_comment' => 'Так себе'
            ],
            [
                'id_user'      => 1,
                'id_movie'     => 5,
                'text_comment' => 'Не понравился!'
            ],
        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!count(Comment::get())) {
            $seederData = $this->getSeederData();

            foreach ($seederData as $item) {
                $comment = new Comment();
                $comment->id_user =      $item['id_user'];
                $comment->id_movie =     $item['id_movie'];
                $comment->text_comment = $item['text_comment'];
                $comment->save();
            }
        }
    }
}
