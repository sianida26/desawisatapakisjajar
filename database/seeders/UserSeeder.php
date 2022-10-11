<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@desawisatapakisjajar.com',
                'password' => 'pakisjajarhore',
                'role' => 'admin',
            ],
            [
                'name' => 'Developer',
                'email' => 'dev@desawisatapakisjajar.com',
                'password' => 'Capacitor 16nF',
                'role' => 'developer',
            ],
        ];

        $count = 0;
        collect($users)
            ->each(function($user) use (&$count){
                if (User::where('email',$user['email'])->exists()) return $this->command->warn('User ' . $user['name'] . ' already created');
                $user = User::create([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => Hash::make($user['password']),
                ]);
                $user->assignRole($user['role']);
                $count++;
            });
        
        return $this->command->info($count . ' users have been created');
    }
}
