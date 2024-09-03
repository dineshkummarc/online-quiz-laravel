<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\QuestionValidation;
use DB;
use Auth;
use App\Quiztaken;
use App\Rating;
use App\Question;
use App\Category;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionValidation $request)
    {
        $question=new Question;
        $question->question=$request->question;
        $question->opt1=$request->opt1;
        $question->opt2=$request->opt2;
        $question->opt3=$request->opt3;
        $question->opt4=$request->opt4;
        $question->answer=$request->ans;
        $question->category_id=$request->cat_id;
        $question->save();
        $details=Category::where('id',$request->cat_id)->first();
        session()->flash('message','Created successfully');
        return view('quiz.makequiz',compact('details'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $display = Question::where('category_id',$request->get('category'))->get();
        if($display->isEmpty())
        {
            session()->flash('message','Sorry, no questions available');
            return redirect('student');
        }
        $cat=category::find($request->get('category'));
        return view('quiz.takequiz',compact('display','cat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $quiz=Category::find($request->get('delete_quiz'));
        $quiz->delete();
        session()->flash('message','Deleted successfully');
        return redirect('teacher');
    }
}
