<?php


Route::prefix('admin')
        ->namespace('Admin')
        ->middleware('auth')
        ->group(function() {
    
    /**
     * Route Role x User
    */
    Route::get('users/{id}/role/{idRole}/detach', 'ACL\RoleUserController@detachRoleUser')->name('user.role.detach')->middleware(['can:roles']);
    Route::post('users/{id}/roles', 'ACL\RoleUserController@attachRolesUser')->name('users.roles.attach')->middleware(['can:roles']);
    Route::any('users/{id}/roles/create', 'ACL\RoleUserController@rolesAvailable')->name('users.roles.available')->middleware(['can:roles']);
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
    * Route Tables
    */
    Route::any('tables/search', 'TableController@search')->name('tables.search');
    Route::resource('tables', 'TableController');

    /**
     * Route Product x Basket
    */
    Route::get('products/{id}/basket/{idBasket}/detach', 'BasketProductController@detachBasketProduct')->name('product.basket.detach');
    Route::post('products/{id}/baskets', 'BasketProductController@attachBasketsProduct')->name('products.baskets.attach');
    Route::any('products/{id}/baskets/create', 'BasketProductController@basketsAvailable')->name('products.baskets.available');
    Route::get('products/{id}/baskets', 'BasketProductController@baskets')->name('products.baskets');
    Route::get('baskets/{id}/products', 'BasketProductController@products')->name('baskets.products');
    

    /**
    * Route Products
    */
    Route::any('products/search', 'ProductController@search')->name('products.search');
    Route::resource('products', 'ProductController');


    /**
    * Route Baskets
    */
    Route::any('baskets/search', 'BasketController@search')->name('baskets.search');
    Route::resource('baskets', 'BasketController');

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
    Route::get('/', 'PlanController@index')->name('admin.index');
});


/**
 * Site
 */
Route::get('/plan/{url}', 'Site\SiteController@plan')->name('plan.subscription');
Route::get('/', 'Site\SiteController@index')->name('site.home');


/**
 * Auth Routes
 */
Auth::routes();