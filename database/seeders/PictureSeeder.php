<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Picture;
use App\Models\BookPicture;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imageMap = [
            'Ľúbostný list' => [
                [
                    'title' => 'Ľúbostný list',
                    'url' => 'https://mrtns.sk/tovar/_l/2879/l2879963.jpg?v=17460722132',
                    'source' => 'Martinus'
                ]
            ],
            'Bezmocná' => [
                [
                    'title' => 'Bezmocná',
                    'url' => 'https://mrtns.sk/tovar/_xl/2582/xl2582787.jpg?v=17460872142',
                    'source' => 'Martinus'
                ]
            ],
            'Bezohledná' => [
                [
                    'title' => 'Bezohledná',
                    'url' => 'https://mrtns.sk/tovar/_xl/2813/xl2813629.jpg?v=17461586052',
                    'source' => 'Martinus'
                ]
            ],
            'Odvážná' => [
                [
                    'title' => 'Odvážná',
                    'url' => 'https://mrtns.sk/tovar/_l/2813/l2813655.jpg?v=17460722132',
                    'source' => 'Martinus'
                ]
            ],
            'Fearless' => [
                [
                    'title' => 'Fearless',
                    'url' => 'https://www.vydavatel.sk/userfiles/Eshop/EshopProduct/image/original/0471615-23.jpg?ts=1741920514',
                    'source' => 'vydavatel.sk'
                ]
            ],
            'Reckless' => [
                [
                    'title' => 'Reckless',
                    'url' => 'https://mrtns.sk/tovar/_xl/2387/xl2387241.jpg?v=17460722182',
                    'source' => 'Martinus'
                ]
            ],
            'Powerful' => [
                [
                    'title' => 'Powerful',
                    'url' => 'https://mrtns.sk/tovar/_xl/2851/xl2851211.jpg?v=17460722132',
                    'source' => 'Martinus'
                ]
            ],
            'Kráľovná ničoho' => [
                [
                    'title' => 'Kráľovná ničoho',
                    'url' => 'https://mrtns.sk/tovar/_xl/1310/xl1310575.jpg?v=17460722232',
                    'source' => 'Martinus'
                ]
            ],
            'Večný kráľ' => [
                [
                    'title' => 'Večný kráľ',
                    'url' => 'https://mrtns.sk/tovar/_xl/2717/xl2717183.jpg?v=17460879622',
                    'source' => 'Martinus'
                ],
                [
                    'title' => 'Večný kráľ predná strana',
                    'url' => 'https://mrtns.sk/dt/27/17/18/l8883012717183.jpg',
                    'source' => 'Martinus'
                ],
                [
                    'title' => 'Večný kráľ zadná strana',
                    'url' => 'https://mrtns.sk/dt/27/17/18/l8883032717183.jpg',
                    'source' => 'Martinus'
                ]
            ],
            'Krutý princ' => [
                [
                    'title' => 'Krutý princ',
                    'url' => 'https://mrtns.sk/tovar/_xl/2602/xl2602429.jpg?v=17460722152',
                    'source' => 'Martinus'
                ],
                [
                    'title' => 'Krutý princ bočná',
                    'url' => 'https://mrtns.sk/dt/26/02/42/l8615312602429.jpg',
                    'source' => 'Martinus'
                ]
            ],

            'Krutý princ' => [
                [
                    'title' => 'Krutý princ',
                    'url' => 'https://mrtns.sk/tovar/_xl/2602/xl2602429.jpg?v=17460722152',
                    'source' => 'Martinus'
                ],
                [
                    'title' => 'Krutý princ bočná',
                    'url' => 'https://mrtns.sk/dt/26/02/42/l8615312602429.jpg',
                    'source' => 'Martinus'
                ]
            ],

            'Skazený kráľ' => [
                [
                    'title' => 'Skazený kráľ',
                    'url' => 'https://mrtns.sk/tovar/_xl/1310/xl1310731.jpg?v=17460722232',
                    'source' => 'Martinus'
                ]
            ],

            'Ukradnutý dedič' => [
                [
                    'title' => 'Ukradnutý dedič',
                    'url' => 'https://mrtns.sk/tovar/_xl/1871/xl1871085.jpg?v=17460722232',
                    'source' => 'Martinus'
                ]
            ],

            'Väzňov trón' => [
                [
                    'title' => 'Väzňov trón',
                    'url' => 'https://mrtns.sk/tovar/_xl/2739/xl2739739.jpg?v=17460722152',
                    'source' => 'Martinus'
                ]
            ],

            'Mor' => [
                [
                    'title' => 'Mor',
                    'url' => 'https://mrtns.sk/tovar/_xl/2774/xl2774533.jpg?v=17460722142',
                    'source' => 'Martinus'
                ]
            ],

            'Válka' => [
                [
                    'title' => 'Válka',
                    'url' => 'https://mrtns.sk/tovar/_xl/2854/xl2854241.jpg?v=17460722132',
                    'source' => 'Martinus'
                ]
            ],

            'The Ever King' => [
                [
                    'title' => 'The Ever King',
                    'url' => 'https://mrtns.sk/tovar/_xl/2289/xl2289591.jpg?v=17460879622',
                    'source' => 'Martinus'
                ]
            ],

            'Večná kráľovná' => [
                [
                    'title' => 'Večná kráľovná',
                    'url' => 'https://mrtns.sk/tovar/_xl/2986/xl2986979.jpg?v=17460722112',
                    'source' => 'Martinus'
                ],
                [
                    'title' => 'Večná kráľovná zadná strana',
                    'url' => 'https://mrtns.sk/dt/29/86/97/l9308832986979.jpg',
                    'source' => 'Martinus'
                ]
            ],

            'I Hope This Doesn\'t Find You' => [
                [
                    'title' => 'I Hope This Doesn\'t Find You',
                    'url' => 'https://mrtns.sk/tovar/_xl/2519/xl2519089.jpg?v=17460722152',
                    'source' => 'Martinus'
                ]
            ],
            'Sunrise on the Reaping' => [
                [
                    'title' => 'Sunrise on the Reaping',
                    'url' => 'https://mrtns.sk/tovar/_xl/2531/xl2531895.jpg?v=17460722152',
                    'source' => 'Martinus'
                ]
            ],
            'Psychológia peňazí' => [
                [
                    'title' => 'Psychológia peňazí',
                    'url' => 'https://mrtns.sk/tovar/_xl/1760/xl1760077.jpg?v=17460722222',
                    'source' => 'Martinus'
                ]
            ],
            'The Stoic Path to Wealth' => [
                [
                    'title' => 'The Stoic Path to Wealth',
                    'url' => 'https://mrtns.sk/tovar/_xl/2563/xl2563983.jpg?v=17383861912',
                    'source' => 'Martinus'
                ]
            ],
        ];


        foreach ($imageMap as $bookTitle => $images) {
            $book = Book::where('name', 'like', "%{$bookTitle}%")->first();

            if ($book) {
                foreach ($images as $imgData) {
                    $picture = Picture::create([
                        'title' => $imgData['title'],
                        'url' => $imgData['url'],
                        'source' => $imgData['source'],
                    ]);

                    echo "Created picture with ID: {$picture->id}\n";
                    echo "Linked picture to book: {$book->name}\n";

                    BookPicture::create([
                        'id_book' => $book->id,
                        'id_picture' => $picture->id,
                    ]);
                }
            }
        }
    }
}
