<?php

namespace App\Providers;

use App\Models\Language;
use App\Models\Pages;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        $languages = Language::where('status', 1)->get();
        $pages = Pages::where('status', 1)->get();
        view()->share([
            'languages' => $languages,
            'pagess' => $pages
        ]);
    }
}
