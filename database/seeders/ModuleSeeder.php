<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            'Department',
            'Doctor',
            'Booking',
            'Patient',
            'Contact'
        ];

        $links = [
            'department',
            'doctor',
            'booking',
            'patient',
            'contact'
        ];

        foreach($modules as $key => $module){
            Module::create([
                'name' => $module,
                'title' => $links[$key]
            ]);
        }
    }
}
