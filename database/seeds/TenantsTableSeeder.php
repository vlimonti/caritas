<?php

use App\Models\Plan;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();

        $plan->tenants()->create([
            'cnpj'  => '53215497000121', 
            'name'  => 'IGREJA BATISTA VIDA NOVA', 
            'url'   => 'ibvnrp', 
            'email' => 'admin@4king.com.br'
        ]);
    }
}
