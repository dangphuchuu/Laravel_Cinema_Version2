<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //TODO: User
        require 'user.php';

        //TODO: Create Role
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'staff']);
        Role::create(['name' => 'user']);


        //TODO:Permissions
        require 'permissions.php';
        $permission = Permission::all();
        //TODO: Set role for admin with id 1
        $user = User::find(1);
        $user->assignRole('admin');
        //TODO: Set permissions for admin with id 1
        $user->givePermissionTo($permission);

        //TODO: Set role for admin with id 2
        $user = User::find(2);
        $user->assignRole('admin');
        //TODO: Set permissions for admin with id 2
        $user->givePermissionTo($permission);


        //TODO: Set role for user
        $user = User::find(3);
        $user->assignRole('user');

        //TODO: Set role for user
        $user = User::find(4);
        $user->assignRole('user');

        //TODO: Movie Genre
        require 'movie_genre.php';

        //TODO: Rated
        require 'rating.php';
        //TODO: Directors
        require 'director.php';
    }
}
