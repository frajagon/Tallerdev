<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_docente = Role::where('name', 'docente')->first();
        $role_acudiente = Role::where('name', 'acudiente')->first();
        $role_admin = Role::where('name', 'admin')->first();

        $user = new User();
        $user->name = 'Docente';
        $user->email = 'frajagon@gmail.com';
        $user->password = bcrypt('*123456*');
        $user->save();

        $user->roles()->attach($role_docente);

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'fjgr323@gmail.com';
        $user->password = bcrypt('*123456*');
        $user->save();

        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Acudiente';
        $user->email = 'frajagon@hotmail.com';
        $user->password = bcrypt('*123456*');
        $user->save();

        $user->roles()->attach($role_acudiente);
    }
}
