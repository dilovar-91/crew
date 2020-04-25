<?php

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
    $role_employer = Role::where('name', 'employer')->first();
    $role_seamen  = Role::where('name', 'seamen')->first();
    $role_administrator  = Role::where('name', 'administrator')->first();
    $employer = new User();
    $employer->name = 'employer Name';
    $employer->email = 'employer@example.com';
    $employer->password = bcrypt('secret');
    $employer->save();
    $employer->roles()->attach($role_employer);
    $seamen = new User();
    $seamen->name = 'seamen Name';
    $seamen->email = 'seamen@example.com';
    $seamen->password = bcrypt('secret');
    $seamen->save();
    $seamen->roles()->attach($role_seamen);
    $administrator = new User();
    $administrator->name = 'Admin';
    $administrator->email = 'admin@example.com';
    $administrator->password = bcrypt('secret');
    $administrator->save();
    $administrator->roles()->attach($role_administrator);
  }
}
