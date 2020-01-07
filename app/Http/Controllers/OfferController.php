<?php

namespace App\Http\Controllers;

use App\Notifications\Offered;
use App\Notifications\Selected;
use App\Offer;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    public function __constructor()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $own_question = Question::find($request->question_id)->user;
        
        
        
        $this->validate($request , [
            'price' => 'required'
            ]);
            
            
            Offer::create([
                'price' => $request->price,
                'user_id' => Auth::user()->id,
                'question_id' => $request->question_id
                ]);
             
         $own_question->notify(new Offered(Auth::user()->fullName , $request->question_id) );

       return redirect()->back();
    }

    public function update(Offer $offer , Request $request)
    {
       $send_notification_user = $offer->user;
      
       $offer->selected = true;
       $offer->save();
        
       $send_notification_user->notify(new Selected(Auth::user()->fullName , $request->question_id));

       return redirect()->back();
    }
}