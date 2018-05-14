<?php

namespace App\Http\Controllers\User\Profile;

use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Session;
use Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);

        return view('user.profile.profile', ['user' => $user]);
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $fileName = config('custom.user.avatar_default');
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = $file->getClientOriginalName().date('Y-m-d H:i:s');
            $fileName = md5($fileName) . '.' . $file->getClientOriginalExtension();
            $file->move(config('custom.image.path_avatar'), $fileName);
        } else {
            $fileName = $user->avatar;
        }

        $dataUser = $request->only('name', 'email', 'phone', 'credit_card', 'gender', 'dob');
        $dataUser['role_id'] = config('custom.user.role_id');
        $dataUser['points'] = $user->points;
        $dataUser['avatar'] = $fileName;
        User::find($id)->update($dataUser);
        Session::flash('success', trans('custom.user_admin.edit_success'));

        return redirect()->route('profile.index');
    }

    public function indexChangePassword()
    {
        $user = User::findOrFail(Auth::user()->id);

        return view('user.profile.changePassword', ['user' => $user]);
    }

    public function storeChangePassword(ChangePasswordRequest $request)
    {
        $flag = User::changePassword($request->old_password, $request->password);
        if ($flag) {
            Session::flash('success', trans('custom.user_admin.password_success'));

            return redirect()->route('changePass');
        } else {
            Session::flash('fail', trans('custom.user_admin.password_fail'));

            return redirect()->route('changePass');
        }
    }
}
