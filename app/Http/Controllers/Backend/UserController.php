<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

//use Spatie\Permission\Models\Role;


class UserController extends Controller
{

    static $viewPath = 'backend.pages.user.';

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $users = (new User)->allUsers();
        return view('backend.pages.user.index', compact('users'));
//        return view('backend.pages.user.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $roles = Role::all();
        return view('backend.pages.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $data = $this->validateForm($request);
        $user = (new User)->storeUser($request, $data);
        return redirect()->route('backend.user.index')->with('message', 'The user is created successfully');
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
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = (new user)->findUser($id);
        return view('backend.pages.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'name'       => 'required',
                'email'      => 'required|email',
            ]);
        $user = (new user)->updateUser($request, $id);
        return redirect()->route('backend.user.index')->with('message', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.

     */
    public function destroy(Request $request)
    {
        if (auth()->user()->id == $request->id_user){
            return redirect()->route('backend.user.index')->with('message','You can not delete yourself!');
        }
        $user = (new User)->deleteUser($request->id_user);
        return redirect()->route('backend.user.index')->with('message','User deleted successfully');
    }


    /**
     * profile the specified resource from storage.

     */
    public function profile()
    {
        return view('backend.pages.user.profile');
    }

    /**
     * changePassword.
     */
//    public function changePassword(Request $request)
//    {
////        return $request->all();
//        $request->validate([
//            'current_password' => ['required', new MatchOldPassword(auth()->user())],
//            'new_password' => ['required', 'min:8'],
//            'new_confirm_password' => ['same:new_password'],
//        ]);
//
//        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
//
//        return redirect()->back()->with('message', 'Password changed successfully.');
//    }

    public function validateForm($request)
    {
        return $this->validate($request,
            [
                'name'       => 'required',
                'email'      => 'required|unique:users',
                'password'   => 'required|min:6',
            ]);
    }
}

