<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Comment;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(config('custom.pagination.user_table'));
        return view('admin.user.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->dob = $request->dob;
        $user->phone = $request->phone;

        if ($request->password == '') {
            $user->password = bcrypt(config('custom.user.password_default'));
        } else {
            $user->password = bcrypt($request->password);
        }

        if ($request->credit_card == '') {
            $user->credit_card = config('custom.user.credit_card');
        } else {
            $user->credit_card = $request->credit_card;
        }
        $user->points = config('custom.user.points');

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = $file->getClientOriginalName().date('Y-m-d H:i:s');
            $fileName = md5($fileName) . '.' . $file->getClientOriginalExtension();
            $file->move(config('custom.image.path_avatar'), $fileName);
            $user->avatar = $fileName;
        } else {
            $user->avatar = config('custom.user.avatar');
        }

        $user->gender = $request->gender;
        $user->dob = $request->dob;
        $user->role_id = config('custom.user.role_id');
        $user->remember_token = str_random(10);
        $user->save();

        Session::flash('success', trans('custom.user_admin.create_success'));

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);
            return view('admin.user.show', compact('user'));
        } catch (ModelNotFoundException $e) {
            return view('admin.partials.404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
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
        
        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => config('custom.user.role_id'),
            'phone' => $request->phone,
            'credit_card' => $request->credit_card,
            'points' => $user->points,
            'avatar' => $fileName,
            'gender' => $request->gender,
            'dob' => $request->dob,
        ]);

        Session::flash('success', trans('custom.user_admin.edit_success') . ' id = ' . $id);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::commentUser($id)->delete();
        User::destroy($id);
        Session::flash('success', trans('custom.user_admin.delete_success') . ' id = ' . $id);

        return redirect()->route('user.index');
    }
}
