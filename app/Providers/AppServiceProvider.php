<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
//use Illuminate\View\View;
use Illuminate\Support\Facades\View;
use App\Message;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('rooms',function ($view){
            $title = 'Sea Urchin Hotel - Booking Request';
            return view('inc.head')->with('title', $title);

        });
        view()->composer('admin.layouts.admin', function($view) {
          $message_count = Message::where('status', 1)->count();

            $view->with('message_count', $message_count);
         });

        Schema::defaultStringLength(191);
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
