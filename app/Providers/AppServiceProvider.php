<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
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
    public function boot(): void
    {
        if (!request()->routeIs('formchecklist.index')) {
            session()->forget('form_checklist_id');
        }

        Blade::directive('plainText', function ($expression) {
            return "<?php
                \$__text = html_entity_decode($expression, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                \$__text = preg_replace('/<(br|p|div|li|tr|h[1-6])[^>]*>/i', \"\\n\", \$__text);
                echo e(trim(strip_tags(\$__text)));
            ?>";
        });

    }
}
