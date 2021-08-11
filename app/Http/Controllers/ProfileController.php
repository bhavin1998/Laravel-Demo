<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit(Request $request)
    {
        
        // return "Updated";
    // return $userid;
    return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,$id)
    {
        //auth()->user()->update($request->all());
        $user = User::findorFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        $imgdata = $request->file('profileimage');
        // $imagename = time().'.'.$imgdata->getClientOriginalExtension();
        // $imgdata->move(public_path('userimages'), $imagename);
        return $imgdata;
        // $user->profilepic = $imagename;
        //  $user->update();
        

        // return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
