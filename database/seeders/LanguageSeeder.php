<?php

namespace Database\Seeders;

use App\Models\Language;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{

    public function run()
    {
        Language::create(
            [
                'name' => 'English',
                'code' => 'en',
                'status' => 1,
            ]);

        Language::create(
            [
                'name' => 'Azərbaycan',
                'code' => 'az',
                'status' => 1,
            ]);
    }
}
