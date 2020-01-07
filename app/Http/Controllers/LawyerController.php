<?php

namespace App\Http\Controllers;

use App\Lawyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LawyerController extends Controller
{
    public function __constructor()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'lawyerCode' => 'required' , 
            'skill' => 'required' , 
            'educated' => 'required' , 
            'lawPlace' => 'required'
        ]);
        
        if($request->has('avatar'))
        {
            $uploadedFile = $request->file('avatar');
            $fielName = time().'.'.$uploadedFile->getClientOriginalExtension();
            $patch = public_path('/avatars');
            $uploadedFile->move($patch , $fielName);

            Lawyer::create([
                'lawyerCode' => $request->lawyerCode , 
                'lawPlace' => $request->lawPlace , 
                'skill' => $request->skill , 
                'educated' => $request->educated ,
                'avatar' => '/avatars/'.$fielName, 
                'user_id' => Auth::user()->id
            ]);
    
        }
        else
        {
            Lawyer::create([
                'lawyerCode' => $request->lawyerCode , 
                'lawPlace' => $request->lawPlace , 
                'skill' => $request->skill , 
                'educated' => $request->educated ,
                'user_id' => Auth::user()->id
            ]);
        }

        return redirect(route('home'));
    }

    public function update(Lawyer $lawyer , Request $request)    
    {
        $uploadedFile = $request->file('avatar');
        $fielName = time().'.'.$uploadedFile->getClientOriginalExtension();
        $patch = public_path('/avatars');
        $uploadedFile->move($patch , $fielName);

    
        $lawyer->lawyerCode = $request->lawyerCode;
        $lawyer->lawPlace = $request->lawPlace;
        $lawyer->skill = $request->skill;
        $lawyer->educated = $request->educated;
        $lawyer->avatar = '/avatars/'.$fielName;
        
        $lawyer->save();
        
        return redirect(route('home'));
    }
}
