<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Storage;
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
        $data['users'] = User::where('user_type',0)->get();
        return view('admin.users.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
        $id = decrypt($id);
        $data['title'] = 'Edit User';
        $data['active'] = 'users';
        $data['user'] = User::find($id);
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
        //
        $id = decrypt($request->id);
        $validated = $request->validate([
            'name' => 'required',
            'mobile' => 'required',
        ]);  
        
        $user = User::find($id);
        if($user){
            if ($request->hasFile('profile')) {

                $validated = $request->validate([
                    'profile' => 'mimes:jpg,jpeg,png' // Only allow .jpg, .bmp and .png file types.
                ]);
                if(Storage::exists('app/public/users/'.$user->profile)){
                    Storage::delete('app/public/users/'.$user->profile);
                }
                $request->profile->store('users', 'public');
                $file_name = $request->profile->hashName();
                $user->profile = $file_name;
            }
            $user->name = $request->get('name');
            $user->mobile = $request->get('mobile');

            $user->save();
            return redirect('admin/users')->with('status', 'User data updated Successfully');
        }else{
            return redirect('admin/users')->with('status', 'Incorrect User');

        }



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
