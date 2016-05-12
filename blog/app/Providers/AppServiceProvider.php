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

	$apm_vendors = [
	    'newrelic' => 'https://d0.awsstatic.com/events/aws-hosted-events/2016/US/NewRelic-logo-square.png', 
	    'oneapm' => 'http://news.oneapm.com/content/images/2015/08/logo---01-3.png', 
            'tinCloud' => 'http://mobile.51cto.com/exp/apm/images/2.png'
	];
	
	view()->share('apm_vendors', $apm_vendors);
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
