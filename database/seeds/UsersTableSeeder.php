<?php

use App\Models\Tenant;
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
        $tenant = Tenant::first();

        $tenant->users()->create([
            'name' => 'Admin',
            'email' => 'admin@4king.com.br',
            'password' => bcrypt('123456'),
        ]);
    }
}
