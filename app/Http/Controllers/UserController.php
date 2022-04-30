<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return 'list user';
    }

    public function create(){
        return 'create user';
    }

    public function store(Request $request){

    }

    public function edit($id){
        return $id;
    }

    public function update(Request $request, $id){}

    public function delete($id){}

    public function changeStatus($id){}
}
