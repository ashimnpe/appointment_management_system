<?php

namespace App\Helpers;

use App\Models\District;
use App\Models\Province;

class LocationHelper{
    public function getProvince(){
        $province = Province::pluck('name','id');
        return $province;
    }

    public function getDistrict($provinceId) {
        $district = District::where('province_id', $provinceId)->pluck('name', 'id');
        return $district;
    }
}
