<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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
    function getProvince($id = null){
        if($id == null){
            return DB::table('province')->get();
        }
        return DB::table('province')->where('id',$id)->first();
    }
}

if(!function_exists('getDistrict')){
    function getDistrict($id = null){
        if($id == null){
            return DB::table('district')->get();
        }
        return DB::table('district')->where('id',$id)->first()->ward;
    }
}
