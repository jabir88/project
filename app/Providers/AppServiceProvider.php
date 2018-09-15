<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Contact;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::composer('admin.inc.header', function ($mess) {
            $messes = Contact::orderBy('id', 'DESC')->where('status', 1)->get();
            $mess->with(compact('messes'));
        });
        View::composer('admin.inc.header', function ($mees_counter) {
            $mess_count = Contact::where('status', 1)->count();
            $mees_counter->with(compact('mess_count'));
        });
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
