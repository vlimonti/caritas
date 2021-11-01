<?php

namespace App\Providers;

use App\Models\{
    Category,
    Ministry,
    Plan,
    Music,
    Person,
    Skill,
    Team,
    Tenant
};
use App\Observers\{
    CategoryObserver,
    MinistryObserver,
    PlanObserver,
    MusicObserver,
    PersonObserver,
    SkillObserver,
    TeamObserver,
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
        Category::observe(CategoryObserver::class);
        Music::observe(MusicObserver::class);
        Team::observe(TeamObserver::class);
        Ministry::observe(MinistryObserver::class);
        Person::observe(PersonObserver::class);
        Skill::observe(SkillObserver::class);
    }
}
