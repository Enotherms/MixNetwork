<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutUs;

class AboutUsSeeder extends Seeder
{
    public function run()
    {
        AboutUs::firstOrCreate([
            'content' => 'This is the default About Us content. Please update it with actual information.'
        ]);
    }
}
