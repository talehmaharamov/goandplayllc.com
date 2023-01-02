<?php

use App\Models\Settings;

if (! function_exists('setting'))
{
    function setting($name)
    {
        $setting = Settings::where('name', $name)->first();
        return $setting ? $setting->guard : '';
    }
}
