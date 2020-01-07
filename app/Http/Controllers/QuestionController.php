<?php

namespace App\Http\Controllers;

use App\Cat;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index' , 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        return view('questions.all')->with('questions' , Question::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCats = Cat::all();
        return view('questions.create')->with('allCats' , $allCats);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'title' => 'required|min:4',
            'content' => 'required|min:5',
            'cat_id' => 'required'
        ]);

        $question = new Question();

        $question->title = $request->title;
        $question->content =$request->content;
        $question->user_id = Auth::user()->id;
        $question->cat_id = $request->cat_id;

        $question->save();

        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
      
    
        if(Auth::check())
        {
            $offers = $question->offers->where('user_id' , Auth::user()->id);
            $selected_offer = $question->offers->where('selected' , true);
            return view('questions.single')
                    ->with('question' , $question)
                    ->with('offers'  ,$offers)
                    ->with('selected_offer' , $selected_offer);
        } else {
            return view('questions.single')->with('question' , $question);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $allCats = Cat::all();
        return view('questions.edit')
                ->with('question' , $question)
                ->with('allCats' , $allCats);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $this->validate($request , [
            'title' => 'required|min:4',
            'content' => 'required|min:5',
            'cat_id' => 'required'
        ]);

        $question->title = $request->title;
        $question->content = $request->content;
        $question->cat_id = $request->cat_id;

        $question->save();

        return redirect(route('home'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->back();
    }
}
