<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Image;
use File;
use Redirect;
use DB;

class UserController extends Controller
{
    public function profile() {
    	return view('profile', array('user' => Auth::user()) );
    }

    public function editProfile() {
        return view('editprofile', array('user' => Auth::user()) );
    }

    public function update_avatar(Request $request) {
        $user = User::find(Auth::user()->id);
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();

            if ($user->avatar !== 'default.png') {
                $file = 'uploads/avatars/' . $user->avatar;

                if (File::exists($file)) {

                     unlink($file);
                }
            }
            Image::make($avatar)->fit(300, 300)->save('uploads/avatars/' . $filename);
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();

            }
            return Redirect::back();
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $image_path = 'uploads/avatars/'.$user->avatar;

        File::delete($image_path);

        $user->delete();

        return redirect('/login');
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->zipcode = $request->zipcode;
        $user->relation_status = $request->relation_status;
        $user->biography = $request->biography;

        $user->save();

        return redirect('/profile');
    }

    public function edit($id) {
        if(Auth::user()->admin) {
            $user = User::find($id);

            return view('editprofile')
            ->with('user', $user);
        } else {
            return redirect('/home');
        }
    }

    public function show($username) {
        $user = User::where('username', $username)
        ->FirstOrFail();

        return view('profile')
        ->with('user', $user);
    }
}
