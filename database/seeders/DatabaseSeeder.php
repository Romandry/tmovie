<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    private function getSeederData()
    {
        return [
            [
                'name_movie' => 'Nomadland',
                'cover_url'  => 'https://m.media-amazon.com/images/M/MV5BZjZmN2IzYWMtZWI4YS00MGE1LWEyMzYtMTU5MDhjZWVmY2U5XkEyXkFqcGdeQXVyMTA1OTcyNDQ4._V1_QL75_UY266_CR17,0,180,266_.jpg',
                'video'      => 'https://file-examples.com/storage/feb2e515cc6339d7ba1ffcd/2017/04/file_example_MP4_480_1_5MG.mp4'
            ],
            [
                'name_movie' => 'Never Rarely Sometimes Always',
                'cover_url'  => 'https://m.media-amazon.com/images/M/MV5BZjZmN2IzYWMtZWI4YS00MGE1LWEyMzYtMTU5MDhjZWVmY2U5XkEyXkFqcGdeQXVyMTA1OTcyNDQ4._V1_QL75_UY266_CR17,0,180,266_.jpg',
                'video'      => 'https://file-examples.com/storage/feb2e515cc6339d7ba1ffcd/2017/04/file_example_MP4_480_1_5MG.mp4'
            ],
            [
                'name_movie' => 'First Cow',
                'cover_url'  => 'https://m.media-amazon.com/images/M/MV5BZjZmN2IzYWMtZWI4YS00MGE1LWEyMzYtMTU5MDhjZWVmY2U5XkEyXkFqcGdeQXVyMTA1OTcyNDQ4._V1_QL75_UY266_CR17,0,180,266_.jpg',
                'video'      => 'https://file-examples.com/storage/feb2e515cc6339d7ba1ffcd/2017/04/file_example_MP4_480_1_5MG.mp4'
            ],
            [
                'name_movie' => 'Lovers Rock',
                'cover_url'  => 'https://m.media-amazon.com/images/M/MV5BZjZmN2IzYWMtZWI4YS00MGE1LWEyMzYtMTU5MDhjZWVmY2U5XkEyXkFqcGdeQXVyMTA1OTcyNDQ4._V1_QL75_UY266_CR17,0,180,266_.jpg',
                'video'      => 'https://file-examples.com/storage/feb2e515cc6339d7ba1ffcd/2017/04/file_example_MP4_480_1_5MG.mp4'
            ],
            [
                'name_movie' => 'I’m Thinking of Ending Things',
                'cover_url'  => 'https://m.media-amazon.com/images/M/MV5BZjZmN2IzYWMtZWI4YS00MGE1LWEyMzYtMTU5MDhjZWVmY2U5XkEyXkFqcGdeQXVyMTA1OTcyNDQ4._V1_QL75_UY266_CR17,0,180,266_.jpg',
                'video'      => 'https://file-examples.com/storage/feb2e515cc6339d7ba1ffcd/2017/04/file_example_MP4_480_1_5MG.mp4'
            ],
        ];
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (!count(Movie::get())) {
            $seederData = $this->getSeederData();

            foreach ($seederData as $item) {
                $movie = new Movie();
                $movie->name_movie = $item['name_movie'];
                $movie->cover_url =  $item['cover_url'];
                $movie->video =      $item['video'];
                $movie->save();
            }
        }
    }
}
