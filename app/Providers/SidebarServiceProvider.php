<?php

namespace App\Providers;

use App\Models\UserChecklist;
use Illuminate\Support\ServiceProvider;

class SidebarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('layout.sidebar', function ($view) {
            $user_checklist_main = UserChecklist::where('user_id', auth()->id())->get();
            $view->with('user_checklist_main', $user_checklist_main);
        });
    }
}
