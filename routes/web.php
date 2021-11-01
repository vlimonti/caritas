<?php

Route::prefix('admin')
        ->namespace('Admin')
        ->middleware('auth')
        ->group(function() {
    
    /**
    * Route Skills x People
    */
    Route::get('skills/{idSkill}/person/{idPerson}/detach', 'PersonSkillController@detachPersonSkill')->name('skill.person.detach');
    Route::post('skills/{idSkill}/people', 'PersonSkillController@attachPeopleSkill')->name('skills.people.attach');
    Route::any('skills/{idSkill}/people/create', 'PersonSkillController@peopleAvailable')->name('skills.people.available');
    Route::get('skills/{idSkill}/people', 'PersonSkillController@people')->name('skills.people');

    /**
    * Route People x Skills
    */
    Route::get('people/{idPerson}/skill/{idSkill}/detach', 'PersonSkillController@detachSkillPerson')->name('person.skill.detach');
    Route::post('people/{idPerson}/skills', 'PersonSkillController@attachSkillsPeople')->name('people.skills.attach');
    Route::any('people/{idPerson}/skills/create', 'PersonSkillController@skillsAvailable')->name('people.skills.available');
    Route::get('people/{idPerson}/skills', 'PersonSkillController@skills')->name('people.skills');

    /**
    * Route People x Teams
    */
    Route::get('people/{idPerson}/team/{idTeam}/detach', 'PersonTeamController@detachTeamPerson')->name('person.team.detach');
    Route::post('people/{idPerson}/teams', 'PersonTeamController@attachTeamsPerson')->name('people.teams.attach');
    Route::any('people/{idPerson}/teams/create', 'PersonTeamController@teamsAvailable')->name('people.teams.available');
    Route::get('people/{idPerson}/teams', 'PersonTeamController@teams')->name('people.teams');

    /**
    * Route Teams X People
    */
    Route::get('teams/{idTeam}/person/{idPerson}/detach', 'PersonTeamController@detachPersonTeam')->name('team.person.detach');
    Route::post('teams/{idTeam}/people', 'PersonTeamController@attachPeopleTeam')->name('teams.people.attach');
    Route::any('teams/{idTeam}/people/create', 'PersonTeamController@peopleAvailable')->name('teams.people.available');
    Route::get('teams/{idTeam}/people', 'PersonTeamController@people')->name('teams.people');

    /**
    * Route Team
    */
    Route::any('teams/search', 'TeamController@search')->name('teams.search');
    Route::resource('teams', 'TeamController');

    /**
    * Route Skill
    */
    Route::any('skills/search', 'SkillController@search')->name('skills.search');
    Route::resource('skills', 'SkillController');
    
    /**
    * Route Person
    */
    Route::get('people/address/{postal}', 'PersonController@apiPostal')->name('address.postal');
    Route::any('people/search', 'PersonController@search')->name('people.search');
    Route::resource('people', 'PersonController');

    /**
    * Route Ministry
    */
    Route::any('ministries/search', 'MinistryController@search')->name('ministries.search');
    Route::resource('ministries', 'MinistryController');

    /**
     * Route Role x User
    */
    Route::get('users/{id}/role/{idRole}/detach', 'ACL\RoleUserController@detachRoleUser')->name('user.role.detach');
    Route::post('users/{id}/roles', 'ACL\RoleUserController@attachRolesUser')->name('users.roles.attach');
    Route::any('users/{id}/roles/create', 'ACL\RoleUserController@rolesAvailable')->name('users.roles.available');
    Route::get('users/{id}/roles', 'ACL\RoleUserController@roles')->name('users.roles');
    Route::get('roles/{id}/users', 'ACL\RoleUserController@users')->name('roles.users');


    /**
     * Route Permission x Role
    */
    Route::get('roles/{id}/permission/{idPermission}/detach', 'ACL\PermissionRoleController@detachPermissionRole')->name('role.permission.detach');
    Route::post('roles/{id}/permissions', 'ACL\PermissionRoleController@attachPermissionsRole')->name('roles.permissions.attach');
    Route::any('roles/{id}/permissions/create', 'ACL\PermissionRoleController@permissionsAvailable')->name('roles.permissions.available');
    Route::get('roles/{id}/permissions', 'ACL\PermissionRoleController@permissions')->name('roles.permissions');
    Route::get('permissions/{id}/roles', 'ACL\PermissionRoleController@roles')->name('permissions.roles');


    /**
     * Route Roles
    */
    Route::any('roles/search', 'ACL\RoleController@search')->name('roles.search');
    Route::resource('roles', 'ACL\RoleController');

    /**
     * Route Tenants
    */
    Route::any('tenants/search', 'TenantController@search')->name('tenants.search');
    Route::resource('tenants', 'TenantController');

    /**
     * Route Categoria x Music
    */
    Route::get('categories/{id}/music/{idMusic}/detach', 'CategoryMusicController@detachMusicCategory')->name('category.music.detach');
    Route::post('categories/{id}/musics', 'CategoryMusicController@attachMusicsCategory')->name('categories.musics.attach');
    Route::any('categories/{id}/musics/create', 'CategoryMusicController@musicsAvailable')->name('categories.musics.available');
    Route::get('categories/{id}/musics', 'CategoryMusicController@musics')->name('categories.musics');

    /**
     * Route Music x Categoria
    */
    Route::get('musics/{id}/category/{idCategory}/detach', 'CategoryMusicController@detachCategoryMusic')->name('music.category.detach');
    Route::post('musics/{id}/categories', 'CategoryMusicController@attachCategoriesMusic')->name('musics.categories.attach');
    Route::any('musics/{id}/categories/create', 'CategoryMusicController@categoriesAvailable')->name('musics.categories.available');
    Route::get('musics/{id}/categories', 'CategoryMusicController@categories')->name('musics.categories');
    

    /**
    * Route Musics
    */
    Route::any('musics/search', 'MusicController@search')->name('musics.search');
    Route::resource('musics', 'MusicController');


    /**
    * Route Categorias
    */
    Route::any('categories/search', 'CategoryController@search')->name('categories.search');
    Route::resource('categories', 'CategoryController');

    /**
    * Route Users
    */
    Route::any('users/search', 'UserController@search')->name('users.search');
    Route::resource('users', 'UserController');

    /**
     * Route Plan x Profile
    */
    Route::get('plans/{id}/profile/{idProfile}/detach', 'ACL\PlanProfileController@detachPlanProfile')->name('plan.profile.detach');
    Route::post('plans/{id}/profiles', 'ACL\PlanProfileController@attachPlansProfile')->name('plans.profiles.attach');
    Route::any('plans/{id}/profiles/create', 'ACL\PlanProfileController@profilesAvailable')->name('plans.profiles.available');
    Route::get('plans/{id}/profiles', 'ACL\PlanProfileController@profiles')->name('plans.profiles');
    Route::get('profiles/{id}/plans', 'ACL\PlanProfileController@plans')->name('profiles.plans');
    
    /**
     * Route Permission x Profile
    */
    Route::get('permissions/{idPermission}/profiles/{idProfile}/detach', 'ACL\PermissionProfileController@detachProfilePermission')->name('permission.profile.detach');
    Route::post('permissions/{idPermission}/profiles', 'ACL\PermissionProfileController@attachProfilesPermission')->name('permission.profiles.attach');
    Route::any('permissions/{idPermission}/profiles/create', 'ACL\PermissionProfileController@profilesAvailable')->name('permission.profiles.available');
    Route::get('permissions/{idPermission}/profiles', 'ACL\PermissionProfileController@profiles')->name('permissions.profiles');
    
    Route::get('profiles/{id}/permission/{idPermission}/detach', 'ACL\PermissionProfileController@detachPermissionProfile')->name('profiles.permission.detach');
    Route::post('profiles/{id}/permissions', 'ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');
    Route::any('profiles/{id}/permissions/create', 'ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
    Route::get('profiles/{id}/permissions', 'ACL\PermissionProfileController@permissions')->name('profiles.permissions');
    
    /**
     * Route Permissions
    */
    Route::any('permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
    Route::resource('permissions', 'ACL\PermissionController');

    /**
     * Route Profiles
    */
    Route::any('profiles/search', 'ACL\ProfileController@search')->name('profiles.search');
    Route::resource('profiles', 'ACL\ProfileController');

    /**
     * Route Details Plans
    */
    Route::delete('plans/{url}/details/{idDetail}', 'DetailPlanController@destroy')->name('details.plan.destroy');
    Route::get('plans/{url}/details/{idDetail}/s', 'DetailPlanController@show')->name('details.plan.show');
    Route::put('plans/{url}/details/{idDetail}', 'DetailPlanController@update')->name('details.plan.update');
    Route::get('plans/{url}/details/{idDetail}/edit', 'DetailPlanController@edit')->name('details.plan.edit');
    Route::post('plans/{url}/details', 'DetailPlanController@store')->name('details.plan.store');
    Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
    Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plan.index');

    /**
     * Route Plans
    */
    Route::get('plans/create', 'PlanController@create')->name('plans.create');
    Route::put('plans/{url}', 'PlanController@update')->name('plans.update');
    Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
    Route::any('plans/search', 'PlanController@search')->name('plans.search');
    Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');
    Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
    Route::post('plans', 'PlanController@store')->name('plans.store');
    Route::get('plans', 'PlanController@index')->name('plans.index');
     
    /**
     * Route Dashboard
    */
    Route::get('/', 'DashboardController@index')->name('admin.index');
    Route::get('/my-profile', 'DashboardController@userProfile')->name('my-profile');;
});


/**
 * Site
 */
Route::get('/plans/{url}', 'Site\SiteController@plan')->name('plan.subscription');
Route::get('/plans', 'Site\SiteController@plans')->name('site.plans');
Route::get('/about', 'Site\SiteController@about')->name('site.about');
Route::get('/login', 'Site\SiteController@login')->name('site.login');
Route::get('/', 'Site\SiteController@index')->name('site.home');


/**
 * Auth Routes
 */
Auth::routes();