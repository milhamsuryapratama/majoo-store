<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\Models\Admin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use File;

class AdminController extends Controller
{
    public function index()
    {
        $data['title'] = "Profile";
        return view('admin.profile', $data);
    }

    public function update_password(UpdatePasswordRequest $updatePasswordRequest)
    {
        $user = Admin::find(Auth::guard('admin')->user()->id);
//        dd(Hash::check($updatePasswordRequest->request->get('old_password'), $user->password));
        if (!Hash::check($updatePasswordRequest->request->get('old_password'), $user->password)) {
            return redirect()->back()->with('error', 'Old Password was wrong');
        }

        $updatePasswordRequest->validated();

        $user->password = Hash::make($updatePasswordRequest->request->get('password'));
        $user->save();

        Auth::guard('admin')->logout();

        return redirect()->to('/admin/login')->with('success', 'Reset password Success');
    }

    public function update_photo(UpdatePhotoRequest $updatePhotoRequest)
    {
        $updatePhotoRequest->validated();

        $user = Admin::find(Auth::guard('admin')->user()->id);

        if ($updatePhotoRequest->hasFile('photo')) {
            $photo = $updatePhotoRequest->file('photo');
            $user->photo = $photo->getClientOriginalName();
            $user->save();

            File::delete('assets/admin/photo/' . $user->photo);

            $photo->move("assets/admin/photo",$photo->getClientOriginalName());

            return redirect()->back()->with('success', 'Upload Photo Success');
        }
    }
}
