<?php
use Illuminate\Support\Facades\Auth;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\User;
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

if(!function_exists('getRoleUser')){
    function getRoleUser($id) {
        return User::find($id)->role;
    }
}

if(!function_exists('isAdmin')){
    function isAdmin() {
        return getRole() == 1 ? true : false;
    }
}

if(!function_exists('isTeacher')){
    function isTeacher() {
        return getRole() == 2 ? true : false;
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

if(!function_exists('getNameEthnic')){
    function getNameEthnic($id_ethnic){
        return Ethnic::find($id_ethnic)->name ?? 'Chưa cập nhật';
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

if(!function_exists('setStudentCode')){
    function setStudentCode(){
        return rand(1000000000,9999999999);
    }
}

if(!function_exists('getClassByFacultyCode')){
    function getClassByFacultyCode($faculty_id){
        $class_list = ClassList::where('faculty_id', $faculty_id)->get();
        return $class_list;
    }
}

if(!function_exists('getClassName')){
    function getClassName($class_id){
        $class_name = '';
        $class = json_decode($class_id);
        if(is_array($class)){
            foreach($class as $c){
                $class_name .= ClassList::find($c)->name . (end($class) == $c ? '' : ', ');
            }
        }
        else{
            $class_name = ClassList::find($class_id)->name ?? null;
        }
        return $class_name;
    }
}

if(!function_exists('getFacultyNameByClass')){
    function getFacultyNameByClass($class_id){
        $faculty_name = '';
        $class_id = json_decode($class_id);
        if(is_array($class_id)){
            foreach($class_id as $c){
                $faculty_name .= ClassList::find($c)->faculty->name . (end($class_id) == $c ? '' : ', ');
            }
            return implode(array_unique(explode(", ", $faculty_name)));
        }
        else{
            return ClassList::find($class_id)->faculty->name ?? null;
        }
    }
}

if(!function_exists('checkSelected')){
    function checkSelected($id, $value) {
        $selected = false;
        if($value === null){
            return $selected;
        }
        $arrValue = json_decode($value);
        if(is_array($arrValue)){
            if(in_array($id, $arrValue)){
                $selected = 'selected';
            }
        }
        else{
            $selected = $id == $value ? 'selected' : false;
        }
        return $selected;
    }
}
