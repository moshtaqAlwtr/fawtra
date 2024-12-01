<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Models\ChartOfAccount;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

public function boot()
{
    // مشاركة الحسابات مع جميع الواجهات
    View::composer('*', function ($view) {
        $view->with('accounts', ChartOfAccount::all());
    });
}


    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */

}
