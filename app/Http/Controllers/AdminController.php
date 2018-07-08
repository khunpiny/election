<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Area;
use App\Admin;
use App\Header;
use Auth;
use Hash;
use App\Score;
use App\User;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function showChangePasswordForm(){
       return view('admin.admin_changepassword');
     }

     public function changePassword(Request $request){
         if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
             // The passwords matches
             return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
         }
         if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
             //Current password and new password are same
             return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
         }
         $validatedData = $request->validate([
             'current-password' => 'required',
             'new-password' => 'required|string|min:6|confirmed',
         ]);
         //Change Password
         $user = Auth::user();
         $user->password = bcrypt($request->get('new-password'));
         $user->save();
         return redirect()->back()->with("success","Password changed successfully !");
     }

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
      $NUM_PAGE = 5;
      $areas = Area::where('admin_id',Auth::user()->id)
                   ->orderBy('updated_at','desc')
                   ->paginate($NUM_PAGE);
      $query = DB::select('SELECT areas.area_name,scores.admin_id,SUM(scores.score) AS sumscore FROM scores LEFT JOIN areas ON scores.area_id = areas.id GROUP BY admin_id,area_name');
    

      $page = $request->input('page');
      $page = ($page != null)?$page:1;
      $admin = Admin::findOrFail(Auth::user()->id);
      $header= Header::findOrFail(Auth::user()->header_id);
      $allareas = Area::where('admin_id',Auth::user()->id)
                      ->get();
      return view('admin/admin_home')->with('areas',$areas)
                                    ->with('header',$header)
                                    ->with('page',$page)
                                    ->with('NUM_PAGE',$NUM_PAGE)
                                    ->with('allareas',$allareas)
                                    ->with('query',$query);
    }

    public function search(Request $request)
    {
      $NUM_PAGE = 5;
      $key = $request->get('key');
      $areas = Area::where('area_name','like','%'.$key.'%')
                   ->orderBy('updated_at','desc')
                   ->paginate($NUM_PAGE);
      $page = $request->input('page');
      $page = ($page != null)?$page:1;
      $admin = Admin::findOrFail(Auth::user()->id);
      $header= Header::findOrFail(Auth::user()->header_id);
      $allareas = Area::where('admin_id',Auth::user()->id)
                      ->get();
      return view('admin/admin_home')->with('areas',$areas)
                                     ->with('header',$header)
                                     ->with('page',$page)
                                     ->with('NUM_PAGE',$NUM_PAGE)
                                     ->with('allareas',$allareas);

    }
    public function profile()
    {
        return view('admin/admin_profile', array('user' => Auth::user()));
    }

    public function update_avatar(Request $request)
    {
      if($request->hasFile('avatar'))
      {
      $avatar = $request->file('avatar');
      $filename = time() . '.' . $avatar->getClientOriginalExtension();
      Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/' . $filename ) );
      $user = Auth::user();
      $user->update($request->all());
      $user->image = $filename;
      $user->save();
      }
      $user = Auth::user();
      $user->update($request->all());
      return back();

    }

    public function addscore(Request $request){
        $search = Score::where('area_id',$request->get('area_id'))
                       ->where('date',$request->get('date'))
                       ->get();
        if(count($search) > 0){
          $score = Score::findOrFail($search[0]->score_id);
          $area_search = Area::findOrFail($score->area_id);
          $admin = Admin::findOrFail($score->admin_id);
          $header= Header::findOrFail($admin->header_id);
          $allareas = Area::where('admin_id',Auth::user()->id)
                          ->get();
          return view('admin/admin_home')->with('score',$score)
                                         ->with('area_search',$area_search)
                                         ->with('header',$header)
                                         ->with('allareas',$allareas);
        }

        else {
          $admin_add = Admin::findOrFail(Auth::user()->id);
          $header_add= Header::findOrFail($admin_add->header_id);
          $master_add= User::findOrFail($header_add->master_id);
          $area_add = Area::findOrFail($request->get('area_id'));
          $allareas_add = Area::where('admin_id',Auth::user()->id)
                          ->get();
          $date = $request->get('date');
          return view('admin/admin_home')->with('admin_add',$admin_add)
                                         ->with('header_add',$header_add)
                                         ->with('master_add',$master_add)
                                         ->with('area_add',$area_add)
                                         ->with('allareas_add',$allareas_add)
                                         ->with('date',$date);
        }
    }

    public function scoresubmit(Request $request){
        Score::create($request->all());
        $score = Score::all()->last();
    	  return back();
    }


    public function action(Request $request){
        $update = $request->get('update');
        $delete = $request->get('delete');
        if($update == "update"){
            $checkbox = $request->get('checkbox');
            $score_get = $request->get('score');
            $count = count($checkbox);
            for ($i=0; $i<$count; $i++){
                $score_id = (int)$checkbox[$i];
                $score = Score::findOrFail($score_id);
                $score->score = $score_get[$i];
                $score->save();
            }
        }
        if($delete == "delete"){
            $checkbox = $request->get('checkbox');
            $count = count($checkbox);
            for ($i = 0; $i < $count; $i++) {
                $score_id = (int)$checkbox[$i];
                Score::destroy($score_id);
            }
        }
        return redirect('admin/showscore');
    }

    public function showscore(Request $request){
      $NUM_PAGE = 5;
      $scores = DB::table('scores')->select('score_id','score','date','district','amphoe','province','area_name')
                                    ->join('areas','areas.id', '=', 'scores.area_id')
                                    ->join('admins', 'admins.id', '=', 'scores.admin_id')
                                    ->join('headers','admins.header_id', '=', 'headers.id')
                                    ->where('scores.admin_id', Auth::user()->id)
                                    ->orderBy('date', 'desc')
                                    ->paginate($NUM_PAGE);
      $page = $request->input('page');
      $page = ($page != null)?$page:1;;
      return view('admin/admin_showscore')->with('scores',$scores)
                                     ->with('page',$page)
                                     ->with('NUM_PAGE',$NUM_PAGE);

    }

}
