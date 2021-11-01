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
            'description' => 'Igrejas'
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
            'name' => 'categories',
            'description' => 'Categorias'
        ]);
        
        Permission::create([
            'name' => 'musics',
            'description' => 'Músicas'
        ]);

        Permission::create([
            'name' => 'teams',
            'description' => 'Equipes'
        ]);

        Permission::create([
            'name' => 'skills',
            'description' => 'Habilidades'
        ]);

        Permission::create([
            'name' => 'people',
            'description' => 'Pessoas'
        ]);

        Permission::create([
            'name' => 'settings',
            'description' => 'Configurações'
        ]);

        Permission::create([
            'name' => 'records',
            'description' => 'Cadastros'
        ]);    

        Permission::create([
            'name' => 'ministries',
            'description' => 'Ministérios'
        ]); 

        Permission::create([
            'name' => 'operations',
            'description' => 'Operações'
        ]);

        Permission::create([
            'name' => 'scales',
            'description' => 'Escalas'
        ]);
    }
}
