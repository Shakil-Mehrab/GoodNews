<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Model\News;
use App\Model\Category;



class UserLoginController extends Controller
{
public function getSignInPage()
{
    return view('auth.login');
}
public function getSignUpPage()
{
    return view('auth.register');
}
 public function getUserProfile()
    {
        $user=Auth::user();
        return view('admin.users.account',compact("user"));
    }

public function getUsers()
    {
        $users=User::all();
        return view('admin.users.users',compact("users"));
    }

public function getViewUser($id)
    {
        $user=User::find($id);
        return view('admin.users.view',compact("user"));
    }

public function getEditUser($id)
    {
        $user=User::find($id);
        return view('admin.users.edit',compact("user"));
    }

public function postUpdateUser(Request $request,$id)
    {
        $this->validate($request,[
            "name"=>"required|max:100",
			"email"=>"required",             
         ]);
         $user=User::find($id);
         $user->name=$request['name'];
         $user->email=$request['email'];          
         $image=$request->file("image"); 

         if($image){
              //  $image_name=str_random(20);
              //  $ext=strtolower($image->getclientoriginalExtension());
            // $image_full_name=$image_name.".".$ext;
            $image_full_name=$image->getClientOriginalName();
             $upload_path="images/";
             $image_url=$upload_path.$image_full_name;
             $success=$image->move($upload_path,$image_full_name);
            if($success){
              $user->image=$image_url;
              $user->update();
            }
        }
        $user->update();
        return redirect()->route("user.profile")->withSuccess("User Updated !");
    }

public function getDeleteUser($id)
    {
        $user=User::find($id);
        if(Auth::user()->author=='admin' ){
        $user->delete();
        return back()->withSuccess("User Deleted !");
        }
        return redirect()->back()->withError("You can't Delete!");
    }
}
