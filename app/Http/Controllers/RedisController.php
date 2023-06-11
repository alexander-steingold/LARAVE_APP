<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{
    public function index(){
       return Post::first();
        Redis::set('user:1:first_name', 'Mike');
        Redis::set('user:2:first_name', 'John');
       dd(Redis::get('user:1:first_name'));
      // foreach(range(1, 10) as $number){
        //Redis::set('users:' . $number . ':hash', md5($number.'users'));
        //Redis::set('users:' . $number, json_encode([ 'user_hash' => md5($number.'users') ]));
        //Redis::set('users:1', 'this is a test');
      // }
        return "ok";
    }
}
