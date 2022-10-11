<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'admin',
            'warga',
            'developer',
        ];

        $countCreated = 0;

        foreach ($roles as $role) {
            //create role if not exists
            if (!Role::where('name', $role)->exists()) {
                Role::create(['name' => $role]);
                $countCreated++;
            }
        }

        $this->command->info("$countCreated roles have been created");
    }
}
