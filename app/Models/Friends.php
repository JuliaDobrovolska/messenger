<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Friends extends Model
{
    protected $table = 'friends';
    public $timestamps = false;
    
    protected $guarded = [''];
    protected $fillable = ['user_id','friend_id','status','invite'];
    
    
    
    public static function searchFriendName($name)
    {
        $searchFriend = DB::table('users')
            ->leftJoin('friends', 'friends.friend_id', '=', 'users.id')
            ->where('users.name', 'LIKE', '%'.$name.'%')
            ->get();
            
        return $searchFriend;
    }
    public static function getFriend()
    {
        $friends = DB::table('users')
            ->leftJoin('friends', 'friends.friend_id', '=', 'users.id')
            ->leftJoin('profile', 'friends.friend_id', '=', 'profile.id')
            ->where('invite', '=', 0)
            ->select('name', 'photo', 'status', 'invite', 'users.id')
            ->get();
            
        return $friends;
    }
    public static function getInvite()
    {
        $invite = DB::table('friends')
            ->leftJoin('users', 'friends.friend_id', '=', 'users.id')
            ->leftJoin('profile', 'friends.friend_id', '=', 'profile.id')
            ->where('invite', '=', 1)
            ->select('name', 'photo', 'invite')
            ->get();
        return $invite;
    }
   
}
