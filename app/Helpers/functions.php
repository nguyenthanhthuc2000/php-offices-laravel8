<?php
use Illuminate\Support\Facades\Auth;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\Ethnic;
use App\Models\ClassList;
use App\Models\Faculty;
use App\Models\schoolYear;

if(!function_exists('getRole')){
    function getRole() {
        if(Auth::check()) {
            return Auth::user()->role;
        }
    }
}

if(!function_exists('isAdmin')){
    function isAdmin() {
        return getRole() == 1 ? true : false;
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
    function dateFormat($date, $fomat = "d/m/Y") {
        return date($fomat, strtotime($date));
    }
}

if(!function_exists('getProvince')){
    function getProvince(){
        return Province::get();
    }
}

if(!function_exists('getDistrict')){
    function getDistrict($id_province = null){
        if($id_province != null){
            return District::where('_province_id', $id_province)->get();
        }
    }
}

if(!function_exists('getWard')){
    function getWard($id_district = null, $id_province = null){
        if($id_district != null && $id_province != null){
            return Ward::where(['_province_id' => $id_province, '_district_id' => $id_district])->get();
        }
    }
}

if(!function_exists('getEthnic')){
    function getEthnic(){
        return Ethnic::get();
    }
}

if(!function_exists('goPrev')){
    function goPrev($routeBackTo = null){
        if($routeBackTo == null){
            $routeBackTo = url()->current();
        }
        return url()->previous() == url()->current() ? route($routeBackTo) :  url()->previous();
    }
}

if(!function_exists('getClass')){
    function getClass(){
        return ClassList::get();
    }
}

if(!function_exists('getFaculies')){
    function getFaculies(){
        return Faculty::get();
    }
}

if(!function_exists('getSchoolYears')){
    function getSchoolYears(){
        return schoolYear::get();
    }
}
