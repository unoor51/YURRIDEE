<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //view all users
        $data['title'] = 'Users';
        $data['active'] = 'users';
        $data['users'] = User::where('user_type', User::RIDER_USER_TYPE)->get();
        return view('admin.users.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Users';
        $data['active'] = 'users';

        return view('admin.users.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->country_code = $request->country_code;
        $user->password = Hash::make($request->password);
        $user->save();

        $data['title'] = 'Users';
        $data['active'] = 'users';

        return view('admin.users.add',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Users';
        $data['active'] = 'users';
        $data['user'] = User::findOrFail(decrypt($id));
        return view('admin.users.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find($request->id);
        if (!empty($request->name)) {
            $user->name = $request->name;
        }
        if (!empty($request->email)) {
            $user->email = $request->email;
        }
        if (!empty($request->email)) {
            $user->user_type = $request->user_type;
        }
        if (!empty($request->mobile)) {
            $user->mobile = $request->mobile;
        }
        if (!empty($request->country_code)) {
            $user->country_code = $request->country_code;
        }
        if (!empty($request->password)) {
            $user->password = $request->password;
        }
        $user->save();
        return redirect()->back()->with('status', 'User updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $id = decrypt($id);
        $user = User::find($id)->delete();
        return redirect('admin/users')->with('status', 'User Deleted Successfully');

    }
    /**
     * Verify User by the admin.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verifyUser($id)
    {
        //
        $id = decrypt($id);
        $user = User::find($id);
        $user->status = 1;
        $user->save();

        return redirect('admin/users')->with('status', 'User Verified Successfully');
    }
}
