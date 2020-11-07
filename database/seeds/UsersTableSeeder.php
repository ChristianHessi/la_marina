<?php

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = Permission::create([
            'name' => 'Administer roles and permissions'
        ]);

        $role = Role::create([
            'name' => 'admin'
        ]);

        $role->givePermissionTo($permission);

        $user = User::create([
            'name' => 'Administrateur',
            'email' => 'admin@lamarina.com',
            'tel' => '695079965',
            'password' => 'root123'
        ]);

        $user->assignRole($role);
    }
}
