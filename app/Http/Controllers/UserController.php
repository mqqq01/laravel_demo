<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    //
    public function show($id){
        $value = User::find($id);
//        $value = Cache::rememberForever('user:'.$id, function () use ($id) {
//            return User::find($id);
//        });
//        Cache::forever('user:'.$id,$id);
//        $value = Cache::get('user:'.$id);
        return response($value->name,200);
    }
}
