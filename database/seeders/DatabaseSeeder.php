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

        //TODO: Set role for admin
        $user = User::find(1);
        $user->assignRole('admin');

        //TODO: Set permissions for admin
        $permission = Permission::all();
        $user->givePermissionTo($permission);

        //TODO: Set role for user
        $user = User::find(2);
        $user->assignRole('user');

        //TODO: Movie Genre
        require 'movie_genre.php';

        //TODO: Rated
        require 'rating.php';
    }
}
