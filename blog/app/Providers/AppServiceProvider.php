<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Sharing notifications to all views for header.blade.php

        $notifications['messages'] = [
            'fund_received' => 'RMB150',
            'charged' => 'RMB100',
            'machine_provision' => '10s',
        ];
        $notifications['count'] = '3';

	view()->share('notifications', $notifications);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
