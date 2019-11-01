<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use Hash;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $users = User::where('user_type', '=', 'user')->get();

        $currentUser = auth()->user();

        $sdone = $currentUser->getSdoneCount();
        $idone = $currentUser->getIdoneCount();
        $spdone = $currentUser->getSpdoneCount();

        $totalGoals = $currentUser->getTotalGoals();
        $yourPoint = $sdone + $idone + $spdone;
        return view('users.index', compact('currentUser', 'yourPoint', 'totalGoals', 'users'));
    }


    public function update(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:50',
            'last_name' => 'max:100',
            'email' => 'required|string|email|max:255',
            'password' => 'required|min:6',
            'avatar' => 'sometimes|file|image|max:1999',
        ]);

        $currentUser = auth()->user();


        if ($request->hasFile('avatar')) {
            $avatarPath = public_path('storage/' . $currentUser->avatar);
            if (file_exists($avatarPath)) {
                \File::delete('storage/' . $currentUser->avatar);
            }
        }

        $currentUser->update([
            'name' => $request->input('name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'age' => $request->input('age'),
            'adress' => $request->input('adress'),
            'city' => $request->input('city'),
            'region' => $request->input('region'),
            'zipcode' => $request->input('zipcode'),
            'about' => $request->input('about'),
            'instagram' => $request->input('instagram'),
            'facebook' => $request->input('facebook'),
            'password' => Hash::make($request->input('password')),
        ]);


        $this->storeImage($currentUser);

        Session::flash('success', 'Позьзователь обновлен!');
        return redirect()->route('user.board');
    }

    public function storeImage($currentUser) {
        if(request()->hasFile('avatar')){
            $currentUser->update([
                'avatar' => request()->avatar->store('avatar', 'public'),
            ]);

            $image = Image::make(public_path('storage/' . $currentUser->avatar))->crop('400', '400');
            $image->save();
        }
    }


}
