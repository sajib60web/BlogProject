<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();
        $faqs = [
            [
                'title'   => 'Eight Types of Blogs and Bloggers. What Type is Yours?',
                'description'   => 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic'
            ],
            [
                'title'   => 'Which is the best blog to read?',
                'description'   => 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic'
            ],
            [
                'title'   => 'Can I switch plans?',
                'description'   => 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic'
            ],
            [
                'title'   => 'What type of blogs love to read the most, and why?',
                'description'   => 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic'
            ],
            [
                'title'   => 'Have more questions?',
                'description'   => 'When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic'
            ]
        ];
        foreach ($faqs as $faq) {
            $data = new Faq();
            $data->title = $faq['title'];
            $data->description = $faq['description'];
            $data->save();
        }
    }
}
