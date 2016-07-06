<?php

namespace App\Http\Controllers;

use Gate;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follow;
use App\Http\Requests;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function index($id)
    {
        $currentUser = Auth::user();
        $user = User::findOrFail($id);
        $isFollowed = Follow::FollowedBy($user->id, $currentUser->id)->first();

        return view('user.index', compact('user', 'currentUser', 'isFollowed'));
    }

    /**
     * @param UpdateUserRequest $request
     * @param $id
     * @return mixed
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if (Gate::allows('update-info', $id)) {
            $user->name = $request->name;
            $user->email = $request->email;

            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $filename = str_slug($user->name) . '-' . $avatar->getClientOriginalName();
                $request->file('avatar')->move(base_path() . '/public/images/avatar/', $filename);
                $user->avatar = 'images/avatar/' . $filename;
            }

            $user->save();

            $request->session()->flash('success', trans('session.user_update_success'));

            return back();
        }

        abort(403, trans('error.403'));
    }
}
