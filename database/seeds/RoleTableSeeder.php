<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Role all-access aplication
    	Role::create([
    		'name' 			=> 'Administrador',
    		'slug' 			=> 'admin',
    		'special'		=> 'all-access',
    	]);
    }
}
