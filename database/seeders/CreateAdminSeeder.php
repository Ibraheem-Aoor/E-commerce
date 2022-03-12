<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create admin
        $user = User::create([
            'name' => 'Ibraheem' ,
            'email' => 'admin@admin',
            'password' => Hash::make('admin123'),
            'is_admin' => 1,

        ]);
        $role = Role::create(['name' => 'owner']);
        $permissions = Permission::pluck('id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
