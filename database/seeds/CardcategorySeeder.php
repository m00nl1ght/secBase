<?php

use App\Models\Cardcategory;
use Illuminate\Database\Seeder;

class CardcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $category = new Cardcategory();
        $category->name = 'visitor';
        $category->description = 'Посетитель';
        $category->save();

        $category = new Cardcategory();
        $category->name = 'employee';
        $category->description = 'Сотрудник предприятия';
        $category->save();

        $category = new Cardcategory();
        $category->name = 'contractor';
        $category->description = 'Подрядчик';
        $category->save();

        $category = new Cardcategory();
        $category->name = 'service';
        $category->description = 'Сервис';
        $category->save();

        $category = new Cardcategory();
        $category->name = 'class_group';
        $category->description = 'Группа КЛААС';
        $category->save();

        $category = new Cardcategory();
        $category->name = 'practicant';
        $category->description = 'Практикант';
        $category->save();

        $category = new Cardcategory();
        $category->name = 'trainee';
        $category->description = 'Trainee';
        $category->save();
    }
}
