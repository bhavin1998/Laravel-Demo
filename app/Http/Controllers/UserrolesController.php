<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userroles;
use App\Models\User;
use App\Models\Randompwd;
use Illuminate\Support\Str;

class UserrolesController extends Controller
{
    public function index(){
        $userroles = User::all();

        $user = Userroles::all();
        return view('userroles.index',compact('userroles','user'));
    }

    public function userregistration(){
        // $user = Userroles::all();
        // return view('userroles.index',compact('user'));
        // $abc = Str::random( 8 );
        // return $abc;
        $randompwd = new Randompwd();
        $randompwd->pwd = Str::random(8);
        $randompwd->save();
        return view('userroles.registration',compact('randompwd'));
    }
    
    public function admindata()
    {
        $adminuser = User::all()->where('roleid',1);
        $user = Userroles::all();
        return view('userroles.adminuser',compact('adminuser','user'));
    }

    public function userdata()
    {
        $userdata = User::all()->where('roleid',2);
        $user = Userroles::all();
        return view('userroles.userdata',compact('userdata','user'));
    }

    public function edituser($id)
    {
        $edituser = User::findorFail($id);
        return view('userroles.editdetail',compact('edituser'));
    }

    public function updateuser(Request $request, $id)
    {
        $updateuser = User::findorFail($id);
        $updateuser->name = $request->name;
        $updateuser->email = $request->email;
        $updateuser->update();
        return redirect('users');
    }

    public function saveuserdata(Request $request)
    {
        $saveuser = new User();
        $saveuser->name = $request->name;
        $saveuser->email = $request->email;
        $saveuser->password = $request->password;
        $saveuser->roleid = 2;
        $saveuser->save();
        return redirect('users');
    }

    public function viewuserdetail(Request $request,$id)
    {
        $viewuser = User::findorFail($id);
        return view('userroles.viewuser',compact('viewuser'));
    }
}