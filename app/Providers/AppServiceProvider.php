<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use App\Models\SocialIcon;
use App\Models\Category;
use App\Models\Notification;
use App\Models\SubCategory;
use App\Models\Subscription;
use Illuminate\Support\Facades\View;

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
        $settings = Setting::first();
        $socialIcon = SocialIcon::get();
        $category = Category::orderBy('id', 'DESC')->take(5)->get();
        $subCategory = SubCategory::get();
        $notification = Notification::where('notification',0)->latest()->get();
        View::share(['settings' => $settings]);
        View::share(['socialIcon' => $socialIcon]);
        View::share(['category' => $category]);
        View::share(['subCategory' => $subCategory]);
        View::share(['notification' => $notification]);
    }
}
// 'settings', $settings