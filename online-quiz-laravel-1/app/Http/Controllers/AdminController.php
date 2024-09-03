<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;
use Auth;
use App\User;
use App\Rating;
use App\Quiztaken;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers=user::where('permission','1')->get();
        $students=user::where('permission','2')->get();
        $high_score=DB::select('select MAX(quiztakens.score) as "top",users.name as "uname",categories.name as "cname" from quiztakens,users,categories where quiztakens.user_id=users.id and categories.id=quiztakens.category_id group by categories.name order by categories.name');
        return view('admin.home',compact('teachers','students','high_score'));
    }

    public function removeteach()
    {
        $teachers=user::where('permission','1')->get();
        return view('admin.removeteacher',compact('teachers'));
    }

    public function removestud()
    {
        $students=user::where('permission','2')->get();
        return view('admin.removestudent',compact('students'));
    }

    public function delete(Request $request)
    {
        /*$del1=Category::where('user_id',$request->get('remove_user'));*/
        $to_remove = User::find($request->get('remove_user'));
        $to_remove->delete();
        session()->flash('message','Deleted successful');
        return redirect('admin/home');
    }
}
