<?php
use App\Models\Checkbox;
use Illuminate\Database\Seeder;

class CheckboxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $head = [
            'build' => 'Строительно-монтажные работы',
            'warm' => 'Тепловые установки',
            'another' => 'Другое',
        ];

        $main = [
            'build' => [
                'bm1' => 'Строительство',
                'bm2' => 'Монтаж',
                'bm3' => 'Ввод в эксплуатацию',
                'bm4' => 'Капитальный ремонт',
                'bm5' => 'Консервация',
                'bm6' => 'Реконструкция',
                'bm7' => 'Утилизация(снос)-Демонтаж',
            ],
            'warm' => [
                'wm1' => 'Монтаж',
                'wm2' => 'Тех. обслуживание',
                'wm3' => 'Ремонт',
                'wm4' => 'Демонтаж',
            ],
            'another' => [
                'am1' => 'Размещение',
                'am2' => 'Монтаж',
                'am3' => 'Тех. обслуживание',
                'am4' => 'Ремонт',
                'am5' => 'Демонтаж',
            ],
        ];

        $sub = [
            'build' => [
                'bs1' => 'Разборка зданий и сооружений при их реконструкции или сносе',
                'bs2' => 'Земляные работы',
                'bs3' => 'Устройство искуственных оснований и буровые работы',
                'bs4' => 'Бетонные работы',
                'bs5' => 'Монтажные работы',
                'bs6' => 'Каменные работы',
                'bs7' => 'Отделочные работы',
                'bs8' => 'Заготовка и сборка деревянных контрукций',
                'bs9' => 'Изоляционные работы',
                'bs10' => 'Кровельные работы',
                'bs11' => 'Монтаж инженерного оборудования зданий и сооружений',
                'bs12' => 'Испытание смонтированного оборудования и трубопроводов',
                'bs13' => 'Электромонтажные и наладочные работы',
                'bs14' => 'Работы по проходке горных выработок',
            ],
            'warm' => [
        
            ],
            'another' => [
        
            ],
        ];

        foreach($head as $arr=>$key) {
            $insert = new Checkbox();
            $insert->name = $arr;
            $insert->description = $key;
            $insert->category = 'head';
            $insert->parent_id = null;
            $insert->save();
        }

        foreach($main as $arr=>$key) {
            $parent = DB::select('select id from checkboxes where checkboxes.name="'.$arr.'" limit 1');
            
            foreach($key as $arr=>$key) {
                $insert = new Checkbox();
                $insert->name = $arr;
                $insert->description = $key;
                $insert->category = "main";
                $insert->parent_id = $parent[0]->id;
                $insert->save();
            }
        }

        foreach($sub as $arr=>$key) {
            $parent = DB::select('select id from checkboxes where checkboxes.name="'.$arr.'" limit 1');
            
            foreach($key as $arr=>$key) {
                $insert = new Checkbox();
                $insert->name = $arr;
                $insert->description = $key;
                $insert->category = "sub";
                $insert->parent_id = $parent[0]->id;
                $insert->save();
            }
        }
    }
}
