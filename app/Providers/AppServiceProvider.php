<?php

namespace App\Providers;
use Illuminate\Support\Facades\view;
use Illuminate\Support\ServiceProvider;
use App\Models\ProductGroup;
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
        view()->composer('*', function($view) {
            $loai_sp = ProductGroup::all();
            $view->with('loai_sp', $loai_sp);
        });
    }
}
