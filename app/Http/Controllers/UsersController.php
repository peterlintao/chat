<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['show']);
    }

    public function show(User $user){
      return view('users.show', compact('user'));
    }
    public function edit(User $user){
        if (Auth::user()->can('update', $user)) {
            return view('users.edit', compact('user'));
        }
        return redirect('/');
    }

  public function update(UserUpdateRequest $request, User $user, ImageUploadHandler $uploader){
      $data = $request->all();
      if ($request->avatar) {
          $res = $uploader->save($request->avatar, 'avatars', $user->id,400);
          if ($res){
              $data['avatar'] = $res['path'];
          }
      }
      $user->update($data);
      return redirect()->route('users.show',compact('user'))->with('success','用户信息修改成功！' );
  }
}
