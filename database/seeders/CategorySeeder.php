<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
                'name'   => 'Beauty & Fashion',
                'parent_id'   => 0,
                'description'   => 'Beauty & Fashion'
            ],
            [
                'name'   => 'Technology',
                'parent_id'   => 0,
                'description'   => 'Technology'
            ],
            [
                'name'   => 'Comic book',
                'parent_id'   => 0,
                'description'   => 'Comic book'
            ],
            [
                'name'   => 'Health',
                'parent_id'   => 0,
                'description'   => 'Health'
            ],
            [
                'name'   => 'Sports',
                'parent_id'   => 0,
                'description'   => 'Sports'
            ],
            [
                'name'   => 'Shopping',
                'parent_id'   => 0,
                'description'   => 'Shopping'
            ],
            [
                'name'   => 'Gaming',
                'parent_id'   => 0,
                'description'   => 'Gaming'
            ],
            [
                'name'   => 'Relationship',
                'parent_id'   => 0,
                'description'   => 'Relationship'
            ],
        ];
        foreach ($categories as $key => $category) {
            $data = new Category();
            $data->name = $category['name'];
            $data->slug = Str::slug($category['name']);
            $data->parent_id = $category['parent_id'];
            $data->description = $category['description'];
            $data->save();
        }
    }
}
