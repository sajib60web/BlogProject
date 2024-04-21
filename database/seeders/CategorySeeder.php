<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();
        $categories = [
            [
                'name'   => 'Fiction',
                'parent_id'   => 0,
                'description'   => 'Fiction'
            ],
            [
                'name'   => 'Mystery',
                'parent_id'   => 0,
                'description'   => 'Mystery'
            ],
            [
                'name'   => 'Young',
                'parent_id'   => 0,
                'description'   => 'Young'
            ],
            [
                'name'   => 'Science',
                'parent_id'   => 0,
                'description'   => 'Western fiction'
            ],
            [
                'name'   => 'Artists Books',
                'parent_id'   => 0,
                'description'   => 'Artists Books'
            ]
        ];
        foreach ($categories as $key => $category) {
            $data = new Category();
            $data->name = $category['name'];
            $data->parent_id = $category['parent_id'];
            $data->description = $category['description'];
            $data->save();
        }
    }
}
