<?php
use Illuminate\Support\Facades\Auth;


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
        return $perPage * $currentPage - $perPage;
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
