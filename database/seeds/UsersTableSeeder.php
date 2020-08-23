<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();//va permettre de supprimer tout les utilisateurs de la table utilisateur
        DB::table('role_user')->truncate();//va permettre de supprimer tout les donnes de la table role_user

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admincom',
            'password' => Hash::make('password'),
        ]);

       $assistant = User::create([
            'name' => 'assistant',
            'email' => 'assistant@admincom',
            'password' => Hash::make('password'),
        ]);

        $adminRole = Role::Where('name','admin')->first();
        $assistantRole = Role::Where('name','assistant')->first();

        $admin->roles()->attach($adminRole);
        $assistant->roles()->attach($assistantRole);
    }
}
