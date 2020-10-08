<?php


use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $developer = Role::where('slug','web-developer')->first();
        $manager = Role::where('slug', 'project-manager')->first();
        $sto = Role::where('slug', 'sto')->first();
        $cc = Role::where('slug', 'cc')->first();
        $sd = Role::where('slug', 'sd')->first();
        $act = Role::where('slug', 'act')->first();
        $createTasks = Permission::where('slug','create-tasks')->first();
        $manageUsers = Permission::where('slug','manage-users')->first();

        $user1 = new User();
        $user1->name = 'Jhon Deo';
        $user1->email = 'jhon@deo.com';
        $user1->password = bcrypt('secret');
        $user1->save();
        $user1->roles()->attach($developer);
        $user1->permissions()->attach($createTasks);


        $user2 = new User();
        $user2->name = 'Mike Thomas';
        $user2->email = 'mike@thomas.com';
        $user2->password = bcrypt('secret');
        $user2->save();
        $user2->roles()->attach($manager);
        $user2->permissions()->attach($manageUsers);

        $user3 = new User();
        $user3->email = 'sto@sto';
        $user3->name = 'Сотрудник СТО';
        $user3->password = bcrypt('secret');
        $user3->save();
        $user3->roles()->attach($sto);
        $user3->roles()->attach($act);

        $user4 = new User();
        $user4->name = 'Сотрудник СС';
        $user4->email = 'cc@cc';
        $user4->password = bcrypt('secret');
        $user4->save();
        $user4->roles()->attach($cc);
        $user4->roles()->attach($act);

        $user5 = new User();
        $user5->name = 'Сотрудник СБ';
        $user5->email = 'sd@sd';
        $user5->password = bcrypt('secret');
        $user5->save();
        $user5->roles()->attach($sd);
        $user5->roles()->attach($act);
    }
}