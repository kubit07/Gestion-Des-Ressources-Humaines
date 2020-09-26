<?php

use Illuminate\Database\Seeder;

use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Role::truncate();//va permettre de supprimer tout les roles dans la table table role

        Role::create([ 'name' => 'admin']);
        Role::create([ 'name' => 'assistant']);
        Role::create([ 'name' => 'auteur']);
    }
}
