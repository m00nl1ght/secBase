<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $category = new Category();
        $category->name = 'visitor';
        $category->description = 'Посетитель';
        $category->save();

        $category = new Category();
        $category->name = 'contractor';
        $category->description = 'Подрядчик';
        $category->save();

        $category = new Category();
        $category->name = 'businesstrip';
        $category->description = 'Коммандированный';
        $category->save();

        $category = new Category();
        $category->name = 'courier';
        $category->description = 'Курьер\Доставка';
        $category->save();

        $category = new Category();
        $category->name = 'interview';
        $category->description = 'Собеседование';
        $category->save();
    }
}
