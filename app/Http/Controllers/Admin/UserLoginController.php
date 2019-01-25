<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Product;
use App\Category;
use App\Admin;




class UserLoginController extends Controller
{
 public function getUserProfile()
    {
        $users=Admin::all();
        return view('super-admin.users.account',compact("users"));
    }

public function getUsers()
    {
        $users=User::all();
        return view('super-admin.users.users',compact("users"));
    }

public function getViewUser($id)
    {
        $user=User::find($id);
        return view('super-admin.users.view',compact("user"));
    }

public function getEditUser($id)
    {
        $user=User::find($id);
        return view('super-admin.users.edit',compact("user"));
    }
    public function getEditUserAccount($id)
    {
        $user=Admin::find($id);
        return view('super-admin.users.edit-account',compact("user"));
    }
    public function postUpdateUserAccount(Request $request,$id)
    {
        $this->validate($request,[
            "name"=>"required|max:100",
			"email"=>"required",             
         ]);
         $user=Admin::find($id);
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
        return redirect()->route("admin-user.profile")->withMessage("User Updated !");
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
        return redirect()->route("admin-user.profile")->withMessage("User Updated !");
    }

public function getDeleteUser($id)
    {
        $user=User::find($id);
        if(Auth::guard('admin')){
        $user->delete();
        return back()->withMessage("User Deleted !");
        }
        return redirect()->back()->withMessage("You can't Delete!");
    }

public function getChangeToAuthor($id)
    {
      $author=User::find($id);
      $author->author='author';
      if(Auth::guard('admin')){
        $author->update();
        return redirect()->route('admin-users')->withMessage('Change Successfull');
    }
     return redirect()->route('admin-users')->withMessage("You Can't Change");
    }
    
public function getChangeToAdmin($id)
    {
     $admin=User::find($id);
     $admin->author='admin';
     if(Auth::guard('admin')){
        $admin->update();
        return redirect()->route('admin-users')->withMessage('Change Successfull');
     }
     return redirect()->route('admin-users')->withMessage("You Can't Change");
    }
}
