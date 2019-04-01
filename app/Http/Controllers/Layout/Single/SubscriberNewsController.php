<?php

namespace App\Http\Controllers\Layout\Single;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Subscriber;


class SubscriberNewsController extends Controller
{
    public function postSaveSubscriber(Request $request)
    {  
        $this->validate($request,[
            "email"=>"required",
         ]);
        $subscriber=new Subscriber();
        $subscriber->email=$request['email'];
        if($subscriber->save()){
            return back()->withMessage('Thank you');
        }
        return back()->withMessage('Sorry.Try again');
    }
}
