<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\PasswordUpdateRequest;
use App\Http\Requests\Frontend\ProfileUpdateRequest;
use App\Http\Requests\Frontend\SocialUpdateRequest;
use App\Models\User;
use App\Traits\FileUpload;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ProfileController extends Controller
{
    use FileUpload;

    function index(): View
    {
        return view('frontend.student-dashboard.profile.index');
    }

    function instructorIndex(): View
    {
        return view('frontend.instructor-dashboard.profile.index');
    }

    function profileUpdate(ProfileUpdateRequest $request): RedirectResponse
    {
        // dd($request->all());
        $user = Auth::user();

        if($request->hasFile('avatar')) {
            $avatarPath = $this->uploadFile($request->file('avatar'));
            $this->deleteFile($user->image);
            $user->image = $avatarPath;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->bio = $request->about;
        $user->headline = $request->heading;
        $user->gender = $request->gender;
        $user->save();

        
        notyf()->success('Profile Updated successfully!!!');

        return redirect()->back();
    }

    function updatePassword(PasswordUpdateRequest $request): RedirectResponse
    {
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();

        notyf()->success('Password Updated successfully!!!');

        return redirect()->back();
    }

    function updateSocial(SocialUpdateRequest $request): RedirectResponse
    {
        $user = Auth::user();
        $user->facebook = $request->facebook;
        $user->x = $request->x;
        $user->linkedin = $request->linkedin;
        $user->website = $request->website;
        $user->github = $request->github;
        $user->save();

        notyf()->success('Socials Updated successfully!!!');

        return redirect()->back();
    }
}
