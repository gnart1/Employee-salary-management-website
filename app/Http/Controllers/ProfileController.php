<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Http\Request;
use App\Models\ProfileModel;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // dd(auth()->user()->attributes["id"]);
        $data = $request->all();
        $user_info = array_slice($data, 2);
        // dd($user_info);
        $id = Auth::id();

        // $rs = auth()->user()->update($data);
        try {
            $rs = ProfileModel::edit($id, $user_info);
        } catch (AuthenticationException $e) {
            echo $e;
            die;
        }
        if($rs > 0) {
            Session::put("notify_success", "Sửa thành công");
            return redirect()->back();
        } else {
            echo "Loi";
            die;
        }
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(Request $request)
    {
        $curPassword = $request->input('old_password');
        $id = Auth::id();
        $rs = Hash::check($curPassword, auth()->user()->password);
        if($rs) {
            $password = bcrypt($request->request->get('password'));
            $isChanged = ProfileModel::changePassword($id, $password);

            if($isChanged > 0) {
                Session::put("notify_success", "Đổi mật khẩu thành công");
                return redirect()->back();
            } else {
                Session::put("notify_danger", "Đổi mật khẩu không thành công");
                return redirect()->back();
            }
        } else {
            Session::put("notify_danger", "Mật khẩu hiện tại không khớp");
            return redirect()->back();
        }

    }
}
