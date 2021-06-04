<?php

namespace App\Providers;

use App\Models\{
    Basket,
    Plan,
    Product,
    Tenant
};
use App\Observers\{
    BasketObserver,
    PlanObserver,
    ProductObserver,
    TenantObserver
};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Plan::observe(PlanObserver::class);
        Tenant::observe(TenantObserver::class);
        Basket::observe(BasketObserver::class);
        Product::observe(ProductObserver::class);
    }
}
