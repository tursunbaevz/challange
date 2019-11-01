<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use Session;
use App\User;

class UsersController extends Controller
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
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $user = new User;
        return view('admin.users.create')->with('user', $user);
    }

    public function store(Request $request) {
        // validation
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // create product

        $user = new User;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt(request('password'));
        $user->save();

        Session::flash('success', 'Вы добавили нового пользователя!');
        return redirect()->route('admin.users.list');

    }

    public function edit($id){
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|string|email|max:255',
            'password' => 'required|min:6|confirmed',
        ]);

        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->save();

        Session::flash('success', 'Позьзователь обновлен!');
        return redirect()->route('admin.users.list');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash('danger', 'Пользователь удален!');
        return redirect()->route('admin.users.list');
    }

}
