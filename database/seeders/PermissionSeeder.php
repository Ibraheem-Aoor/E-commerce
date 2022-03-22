<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'users management' ,
            'sales management'  ,
            'categories management' ,
            'products management'  ,
            'orders management' ,
            'settings management' ,
        ];

        foreach($permissions as $p)
        {
            Permission::create(['name' => $p]);
        }
    }
}
