<?php

namespace App\Http\Controllers;

use App\Events\InsertFinishEvent;
use App\Jobs\InsertData;
use App\User;
use LRedis;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    //
    public function show($id){
//        $value = User::find($id);
//        $value = Cache::rememberForever('user:'.$id, function () use ($id) {
//            return User::find($id);
//        });
//        Cache::forever('user:'.$id,$id);
//        $value = Carbon::now()->timestamp;
        $value = Cache::get('user:'.$id);
//        return response($value,200);
//        InsertData::dispatch('1060172d-bd3f-3d02-ab65-149c8a886ddb');
//        InsertData::dispatch('1060172d-bd3f-3d02-ab65-149c8a886ddb')->delay(Carbon::now()->addMinutes(1));
//        return response('同步成功',200);
//        $token = '111';
//        $channel = '111';
        event(new InsertFinishEvent($value));
//        $redis = new \Redis();
//        $redis->connect('127.0.0.1', 6379);
//        $redis->publish('insert.finish',[1=>'redis']);
//        $redis = LRedis::connection();
//        print_r($redis);
//        print_r($value);
//        $redis->publish('insert',$value);
    }
}
