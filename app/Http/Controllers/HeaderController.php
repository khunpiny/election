<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use Hash;
use App\Admin;
use App\Header;
use App\Area;
use App\Score;
use DB;

class HeaderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function showChangePasswordForm(){
       return view('header/header_changePassword');
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
      //return 'header';
        $this->middleware('auth:header');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $NUM_PAGE = 5;
      $admins = Admin::where('header_id',Auth::user()->id)
                       ->orderBy('updated_at','desc')
                       ->paginate($NUM_PAGE);
      $header = Header::findOrFail(Auth::user()->id);
      $page = $request->input('page');
      $page = ($page != null)?$page:1;

      return view('header/header_home')->with('admins',$admins)
                                       ->with('header',$header)
                                       ->with('page',$page)
                                       ->with('NUM_PAGE',$NUM_PAGE);
    }

    public function add_admin(Request $request)
    {
      $password = request('password');
      $data = new Admin;
      $data->name = request('name');
      $data->admin_name = request('admin_name');
      $data->header_id = request('header_id');
      $data->tel = request('tel');
      $data->email = request('email');
      $data->status = request('status');
      $data->image = "profile.jpg";
      $data->password = \Hash::make($password);
      $data->save();

      $admin = Admin::all()->last();
      return redirect()->action('HeaderController@area_admin',['admin_id'=>$admin->id]);
    }

    public function register()
    {
      return view('header/header_add');
    }

    public function edit_admin(Request $request, $id)
    {
      $admin = Admin::findOrFail($id);
      $header = Header::findOrFail($admin->header_id);
      return view('header/header_edit')->with('admin', $admin)
                                       ->with('header',$header);
    }

    public function update_admin(Request $request)
    {
      $id = $request->get('admin_id');
      if($request->hasFile('avatar'))
      {
      $avatar = $request->file('avatar');
      $filename = time() . '.' . $avatar->getClientOriginalExtension();
      Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/' . $filename ) );
      $admin = Admin::findOrFail($id);
      $admin->image = $filename;
      $admin->save();
      }
        $admin = Admin::findOrFail($id);
        $admin->update($request->all());
        return back();
    }

    public function block_admin($id)
    {
      $admin = Admin::findOrFail($id);
      if($admin->status == '1' )
        $admin->update(['status' => '0']);
      else
        $admin->update(['status' => '1']);
      return back();
    }

    public function area_admin(Request $request)
    {
      $admin = Admin::findOrFail($request->admin_id);
      $header = Header::findOrFail(Auth::user()->id);
      return view('header/header_area')->with('admin_id',$admin->id)
                                      ->with('header',$header)
                                      ->with('admin_name',$admin->admin_name);
    }

    public function addarea(Request $request)
    {
        $admin_id = $request->get('admin_id');
        $area_name = $request->get('area_name');
            for($i=0;$i<count($area_name);$i++){
             $data = new Area;
             $data->admin_id = $admin_id;
             $data->area_name = $area_name[$i];
             $data->save();
        }
        return redirect()->action('HeaderController@showarea',['admin_id'=>$admin_id]);
    }

    public function showarea(Request $request,$admin_id){
        $NUM_PAGE = 5;
        $areas = Area::where('admin_id',$request->admin_id)
                     ->orderBy('updated_at','desc')
                     ->paginate($NUM_PAGE);
        $scores = DB::select('SELECT `score`,`area_id` FROM `scores`');

        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        $admin = Admin::findOrFail($request->admin_id);
        $header= Header::findOrFail(Auth::user()->id);
        return view('header/header_showarea')->with('areas',$areas)
                                      ->with('header',$header)
                                      ->with('page',$page)
                                      ->with('admin',$admin)
                                      ->with('NUM_PAGE',$NUM_PAGE)
                                      ->with('scores',$scores);
    }

    public function deletearea($area_id)
    {
        $area = Area::findOrFail($area_id);
        $score = Score::where('area_id',$area->area_id)
                      ->delete();
        $area = Area::findOrFail($area_id)->delete();
        return back();
    }

    public function editarea(Request $request, $area_id){
        $area = Area::findOrFail($area_id);
        $admin = Admin::findOrFail($area->admin_id);
        return view('header/header_editarea')->with('area',$area);
    }

    public function updatearea(Request $request,$area_id)
    {
        $area = Area::findOrFail($area_id);
        $area->update($request->all());
        return redirect()->action('HeaderController@showarea',['admin_id'=>$area->admin_id]);
    }

    public function selectarea(){
        $alladmins = Admin::where('header_id',Auth::user()->id)->get();
        $header = Header::findOrFail(Auth::user()->id);
        return view('header/header_area')->with('alladmins',$alladmins)
                                         ->with('header',$header);
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

    public function profile()
    {
        return view('header/header_profile', array('user' => Auth::user()));
    }

    public function search(Request $request)
    {
      $NUM_PAGE = 5;
      $key = $request->get('key');
      $admins = Admin::where('admin_name','like','%'.$key.'%')
                      ->orderBy('updated_at','desc')
                      ->paginate($NUM_PAGE);
      $header = Header::findOrFail(Auth::user()->id);
      $page = $request->input('page');
      $page = ($page != null)?$page:1;

      return view('header/header_home')->with('admins',$admins)
                                       ->with('header',$header)
                                       ->with('page',$page)
                                       ->with('NUM_PAGE',$NUM_PAGE);
    }

    public function score_total()
    {
      $admins = Admin::where('header_id',Auth::user()->id)->get();
      $header = Header::findOrFail(Auth::user()->id);
      return view('header/header_total')->with('admins',$admins)
                                        ->with('header',$header);
    }
}
