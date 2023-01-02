<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\TeamsDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamsDetailSeeder extends Seeder
{
    public function run()
    {
        TeamsDetails::create(
            [
                'title_en' => '',
                'title_az' => '',
                'description_en' => '',
                'description_az' => '',
            ]);
    }
}
