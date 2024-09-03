<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;
use Auth;
use App\Rating;
use App\Question;
use App\Quiztaken;
use App\role_user;
use App\User;

class StudentController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('student');
    }

    public function index()
    {
        $category=category::all();
        $quiz_taken=DB::select('select quiztakens.score, categories.name from quiztakens,categories where quiztakens.user_id='.Auth::user()->id.' and quiztakens.category_id=categories.id');
        $high_score=DB::select('select MAX(quiztakens.score) as "top", users.name as "uname",categories.name as "cname" from quiztakens,users,categories where quiztakens.user_id=users.id and categories.id=quiztakens.category_id group by categories.name order by categories.name');
        $iq = (int)Quiztaken::where('user_id',Auth::user()->id)->avg('score');
    	return view('student',compact('category','quiz_taken','high_score','iq'));
    }

    public function takequiz()
    {
        return view('quiz.takequiz');
    }

    public function rating(Request $request, $id)
    {
        $request->validate([
                'star' => 'required',
                'comment' => 'nullable|max:255'
            ]);
        $rating=new Rating;
        $rating->category_id=$id;
        $rating->user_id=Auth::user()->id;
        $rating->comment=$request->comment;
        $rating->rate=$request->star;
        $rating->save();

        //$avgRate=DB::select('select AVG(rate) from ratings where category_id='.$id);
        $avgRate = Rating::where('category_id',$id)->avg('rate');
        //Category::where('id', $id)->update(array('avg_rate' => 'avgRate'));
        $page = Category::find($id);
        if($page) {
            $page->avg_rate = $avgRate;
            $page->save();
        }
        return redirect('student');
    }

    public function quiz_evaluation(Request $request)
    {
        $correct=0;
        $incorrect=0;
        $no_attempt=0;
        $percentage=0;
        $answers = Question::where('category_id',$request->get('category_id'))->get();
        foreach($answers as $ans) {
            if($ans->answer == $request->get($ans->id))
            {
                $correct++;
            }
            elseif ($request->get($ans->id) == 0) {
                $no_attempt++;
            }
            else
            {
                $incorrect++;
            }
        }
        $percentage=($correct*100)/($correct+$incorrect+$no_attempt);
        $quiz_taken=new Quiztaken;
        $quiz_taken->user_id=Auth::user()->id;
        $quiz_taken->category_id=$request->get('category_id');
        $quiz_taken->correct=$correct;
        $quiz_taken->incorrect=$incorrect;
        $quiz_taken->no_attempt=$no_attempt;
        $quiz_taken->score=$percentage;
        $quiz_taken->save();

        //Quiz_involved
        $temp=Quiztaken::where('user_id',Auth::user()->id)->count();
        $temp3 = User::find(Auth::user()->id);
        if($temp3) {
            $temp3->quiz_involved=$temp;
            $temp3->save();
        }

        $result=[];
        $result['correct']=$correct;
        $result['incorrect']=$incorrect;
        $result['no_attempt']=$no_attempt;
        $result['total_ques']=$correct+$incorrect+$no_attempt;
        $result['score']=number_format($percentage, 2, '.', ',');
        $result['cat_id']=$request->get('category_id');
        return view('quiz.result',compact('result'));
    }
}
