<?php
use Illuminate\Support\Facades\Auth;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;


if(!function_exists('getRole')){
    function getRole() {
        if(Auth::check()) {
            return Auth::user()->role;
        }
    }
}

if(!function_exists('getClassListByUser')){
    function getClassListByUser() {
        if(Auth::check()) {

        }
    }
}

if(!function_exists('getNo')){
    function getNo($perPage, $currentPage) {
        return $perPage * $currentPage - $perPage + 1;
    }
}


if(!function_exists('getNameRole')){
    function getNameRole($role) {
        $role_name = [
            1 => 'Admin',
            2 => 'Giáo viên',
            3 => 'Học sinh'
        ];

        return $role_name[$role] ?? '--';
    }
}

if(!function_exists('dateFormat')){
    function dateFormat($date) {
        return date("d/m/Y", strtotime($date));
    }
}

if(!function_exists('getProvince')){
    function getProvince(){
        return Province::get();
    }
}

if(!function_exists('getDistrict')){
    function getDistrict($id_province = null){
        if($id_province == null){
            return District::get();
        }
        return District::where('_province_id', $id_province)->get();
    }
}

if(!function_exists('getWard')){
    function getWard($id_district = null, $id_province = null){
        if($id_district == null){
            return Ward::get();
        }
        return Ward::where(['_province_id' => $id_province, '_district_id' => $id_district])->get();
    }
}

