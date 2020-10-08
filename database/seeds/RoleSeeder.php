<?php
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $manager = new Role();
        $manager->name = 'Project Manager';
        $manager->slug = 'project-manager';
        $manager->save();

        $developer = new Role();
        $developer->name = 'Web Developer';
        $developer->slug = 'web-developer';
        $developer->save();

        
        $createSto = new Role();
        $createSto->name = 'sto';
        $createSto->slug = 'sto';
        $createSto->save();

        $createCc = new Role();
        $createCc->name = 'cc';
        $createCc->slug = 'cc';
        $createCc->save();

        $createCc = new Role();
        $createCc->name = 'sd';
        $createCc->slug = 'sd';
        $createCc->save();

        $createAct = new Role();
        $createAct->name = 'act';
        $createAct->slug = 'act';
        $createAct->save();
    }
}
