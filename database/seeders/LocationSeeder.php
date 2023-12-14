<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedProvince();
        $this->seedDistrict();
    }

    public function seedProvince(){
        $provinces = [
            ['name' => 'Koshi Province'],
            ['name' => 'Madhesh Province'],
            ['name' => 'Bagmati Province'],
            ['name' => 'Gandaki Province'],
            ['name' => 'Lumbini Province'],
            ['name' => 'Karnali Province'],
            ['name' => 'Sudurpashchim Province'],
        ];
        DB::table('provinces')->insert($provinces);

    }

    public function seedDistrict(){
        $districts = [
            ['name' => 'Taplejung', 'province_id' => 1],
            ['name' => 'Panchthar', 'province_id' => 1],
            ['name' => 'Ilam', 'province_id' => 1],
            ['name' => 'Jhapa', 'province_id' => 1],
            ['name' => 'Sankhuwasabha', 'province_id' => 1],
            ['name' => 'Solukhumbu', 'province_id' => 1],
            ['name' => 'Okhaldhunga', 'province_id' => 1],
            ['name' => 'Terhrathum', 'province_id' => 1],
            ['name' => 'Bhojpur', 'province_id' => 1],
            ['name' => 'Khotang', 'province_id' => 1],
            ['name' => 'Dhankuta', 'province_id' => 1],
            ['name' => 'Udayapur', 'province_id' => 1],
            ['name' => 'Morang', 'province_id' => 1],
            ['name' => 'Sunsari', 'province_id' => 1],

            ['name' => 'Saptari', 'province_id' => 2],
            ['name' => 'Siraha', 'province_id' => 2],
            ['name' => 'Dhanusha', 'province_id' => 2],
            ['name' => 'Mahottari', 'province_id' => 2],
            ['name' => 'Sarlahi', 'province_id' => 2],
            ['name' => 'Rautahat', 'province_id' => 2],
            ['name' => 'Bara', 'province_id' => 2],
            ['name' => 'Parsa', 'province_id' => 2],

            ['name' => 'Dolakha', 'province_id' => 3],
            ['name' => 'Sindhupalchowk', 'province_id' => 3],
            ['name' => 'Dhading', 'province_id' => 3],
            ['name' => 'Nuwakot', 'province_id' => 3],
            ['name' => 'Kathmandu', 'province_id' => 3],
            ['name' => 'Bhaktapur', 'province_id' => 3],
            ['name' => 'Lalitpur', 'province_id' => 3],
            ['name' => 'Kavre', 'province_id' => 3],
            ['name' => 'Ramechhap', 'province_id' => 3],
            ['name' => 'Sindhuli', 'province_id' => 3],
            ['name' => 'Makwanpur', 'province_id' => 3],
            ['name' => 'Chitwan', 'province_id' => 3],
            ['name' => 'Rasuwa', 'province_id' => 3],

            ['name' => 'Gorkha', 'province_id' => 4],
            ['name' => 'Myagdi', 'province_id' => 4],
            ['name' => 'Lamjung', 'province_id' => 4],
            ['name' => 'Tanahu', 'province_id' => 4],
            ['name' => 'Nawalparasi East', 'province_id' => 4],
            ['name' => 'Syangja', 'province_id' => 4],
            ['name' => 'Parbhat', 'province_id' => 4],
            ['name' => 'Baglung', 'province_id' => 4],
            ['name' => 'Kaski', 'province_id' => 4],
            ['name' => 'Mustang', 'province_id' => 4],
            ['name' => 'Manang', 'province_id' => 4],

            ['name' => 'Rolpa', 'province_id' => 5],
            ['name' => 'Pyuthan', 'province_id' => 5],
            ['name' => 'Gulmi', 'province_id' => 5],
            ['name' => 'Arghakharchi', 'province_id' => 5],
            ['name' => 'Palpa', 'province_id' => 5],
            ['name' => 'Nawalparasi West', 'province_id' => 5],
            ['name' => 'Rupandehi', 'province_id' => 5],
            ['name' => 'Kapilvastu', 'province_id' => 5],
            ['name' => 'Dang', 'province_id' => 5],
            ['name' => 'Banke', 'province_id' => 5],
            ['name' => 'Bardiya', 'province_id' => 5],
            ['name' => 'Rukum East', 'province_id' => 5],

            ['name' => 'Dolpa', 'province_id' => 6],
            ['name' => 'Mugu', 'province_id' => 6],
            ['name' => 'Jumla', 'province_id' => 6],
            ['name' => 'Kalikot', 'province_id' => 6],
            ['name' => 'Dailekh', 'province_id' => 6],
            ['name' => 'Jajarkot', 'province_id' => 6],
            ['name' => 'Rukum West', 'province_id' => 6],
            ['name' => 'Salyan', 'province_id' => 6],
            ['name' => 'Surkhet', 'province_id' => 6],
            ['name' => 'Humla', 'province_id' => 6],

            ['name' => 'Bajura', 'province_id' => 7],
            ['name' => 'Bajhang', 'province_id' => 7],
            ['name' => 'Darchula', 'province_id' => 7],
            ['name' => 'Baitadi', 'province_id' => 7],
            ['name' => 'Dadeldhura', 'province_id' => 7],
            ['name' => 'Doti', 'province_id' => 7],
            ['name' => 'Achham', 'province_id' => 7],
            ['name' => 'Kailali', 'province_id' => 7],
            ['name' => 'Kanchanpur', 'province_id' => 7],
        ];

        DB::table('districts')->insert($districts);

    }


}
