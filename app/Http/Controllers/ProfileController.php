<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friends;
use App\User;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $name = $request->input('name');
        $invite = Friends::getInvite();

        if(!empty($name)){
            $friends = Friends::searchFriendName($name);
        }else{
            $friends = Friends::getFriend();
        }

        return view('profile.index',[
            'friends' => $friends,
            'invite' => $invite,
        ]);
    }
    public function update(Friends $friends, Request $request, User $users){
        $friends = Friends::getFriend();
        foreach($friends as $f)
         {
            dd($f->status);
        if($f->status == '0'){
            $f->status = '1';
        }
    }
        return redirect()->route('profile');
    }
    
}
