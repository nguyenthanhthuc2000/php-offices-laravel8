<?php
use Illuminate\Support\Facades\Auth;

if(!function_exists('getRole')){
    function getRole() {
        return Auth::user()->role;
    }
}

if(!function_exists('getClassListByUser')){
    function getClassListByUser() {

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
