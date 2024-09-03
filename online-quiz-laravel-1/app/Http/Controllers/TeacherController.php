<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\QuestionValidation;
use DB;
use App\Category;
use Auth;
use App\User;
use App\Rating;
use App\Quiztaken;

class TeacherController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('teacher');
    }

    public function index()
    {
    	$category=category::where('user_id', Auth::user()->id)->get();
        $high_score=DB::select('select MAX(quiztakens.score) as "top",users.name as "uname",categories.name as "cname" from quiztakens,users,categories where quiztakens.user_id=users.id and categories.id=quiztakens.category_id group by categories.name order by categories.name');
        return view('teacher',compact('category','high_score'));
    }

    public function create(Request $request)
    {
        $request->validate([
                'name' => 'required|unique:categories|max:255',
            ]);
        $cat=new Category;
        $cat->name=$request->name;
        $cat->user_id=Auth::user()->id;
        $cat->save();

        //Quiz_involved
        $temp=Category::where('user_id',Auth::user()->id)->count();
        $temp3 = User::find(Auth::user()->id);
        if($temp3) {
            $temp3->quiz_involved=$temp;
            $temp3->save();
        }

        $details=Category::where('name',$request->name)->first();
        return view('quiz.makequiz',compact('details'));
    }

    public function add_ques(Request $request)
    {
        $details=Category::where('id',$request->q_addition)->first();
        return view('quiz.makequiz',compact('details'));
    }

    public function checking(Request $request)
    {
        $category=category::where('user_id', Auth::user()->id)->get();
        $cat_rating=category::where('user_id', 10000)->get();;
        if($request->has('_token'))
        {
            $cat_rating=DB::select('select users.name, ratings.rate, ratings.comment from users,ratings where ratings.category_id='.$request->check.' and users.id=ratings.user_id');
        }
        return view('quiz/check_rating',compact('category','cat_rating'));
    }
}