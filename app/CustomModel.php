<?php

namespace App;

use DB;
use Illuminate\Support\Facades\Auth;

class CustomModel{

    public function getIsFollowing($followed_id)
    {
        $id = Auth::user()->id;
        $iss =DB::table('followers')->where('user_followed_id', $followed_id)->where('user_following_id', $id)->count();
        if($iss > 0){
          return true;
        }else{
          return false;
        }
    }

    public function unFollow($idkita, $idorang)
    {
        DB::table('followers')->where('user_followed_id', $idorang)->where('user_following_id', $idkita)->delete();
    }

    public function getFollowers($id)
    {
        return DB::table('followers')->leftJoin('users', 'followers.user_following_id', 'users.id')->where('user_followed_id', $id)->get();
    }

    public function getFollowing($id)
    {
        return DB::table('followers')->leftJoin('users', 'followers.user_followed_id', 'users.id')->where('user_following_id', $id)->get();
    }

    public function getPosts()
    {
        $id = Auth::user()->id;
        $data['user_followed'] = DB::table('followers')->leftJoin('users', 'followers.user_following_id', 'users.id')->where('user_following_id', $id)->get();
        foreach ($data['user_followed'] as $key => $value) {
            $data['postnya'] = array();
            $pos = DB::table('posts')->where('user_id', $value->user_followed_id)->get();
            array_push($data['postnya'], $pos);
        }
        dd($data['postnya']);
        //return DB::table('posts')->leftJoin('users', 'posts.user_id', 'users.id')->where('')
    }





}
