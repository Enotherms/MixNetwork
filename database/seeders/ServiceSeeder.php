<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        Service::create([
            'title' => 'Default Service 1',
            'description' => 'Description of the default service 1.'
        ]);

        Service::create([
            'title' => 'Default Service 2',
            'description' => 'Description of the default service 2.'
        ]);
        
        Service::create([
            'title' => 'Default Service 3',
            'description' => 'Description of the default service 3.'
        ]);
    }
}
