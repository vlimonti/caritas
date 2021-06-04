<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'tenants',
            'description' => 'Empresas'
        ]);

        Permission::create([
            'name' => 'plans',
            'description' => 'Planos'
        ]);
        
        Permission::create([
            'name' => 'profiles',
            'description' => 'Perfis'
        ]);

        Permission::create([
            'name' => 'roles',
            'description' => 'Funções'
        ]);

        Permission::create([
            'name' => 'permissions',
            'description' => 'Permissões de acesso'
        ]);
        
        Permission::create([
            'name' => 'users',
            'description' => 'Usuários'
        ]);
        
        Permission::create([
            'name' => 'baskets',
            'description' => 'Cestas'
        ]);
        
        Permission::create([
            'name' => 'products',
            'description' => 'Produtos'
        ]);
        
    }
}
