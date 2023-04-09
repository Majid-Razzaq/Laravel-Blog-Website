<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use Illuminate\_idtp\Request;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return View('admin.user.index',compact('users'));
    }

    public function edit($userId)
    {
        $user = User::find($userId);
        return View('admin.user.edit',compact('user'));
    }

    public function update(Request $request, $userId)
    {
        $user = User::find($userId);
        if($user)
        {
            $user->role_as = $request->role_as;
            $user->update();
            return redirect('admin/users')->with('message','Updated Successfully');
        }
        return redirect('admin/users')->with('message','No User Found!');
    }

    
    public function destroy($userId)
    {
        $post = User::find($userId);
        $post->delete();
        return redirect('admin/users')->with('message','User has been deleted');
    }

}
