<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\Header;
use App\Admin;
use App\Area;
use Redirect;
use Hash;
use DB;


class MasterController extends Controller
{
  public function showChangePasswordForm(){
    return view('master/master_changePassword');
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

    public function index()
    {
      return view('master/master_add');
    }

    public function profile()
    {
        return view('master/master_profile', array('user' => Auth::user()));
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

    public function add_header(Request $request)
    {
      $password = request('password');
      $data = new Header;
      $data->name = request('name');
      $data->header_name = request('header_name');
      $data->master_id = request('master_id');
      $data->tel = request('tel');
      $data->province = request('province');
      $data->amphoe = request('amphoe');
      $data->district = request('district');
      $data->email = request('email');
      $data->status = request('status');
      $data->image = "profile.jpg";
      $data->password = \Hash::make($password);
      $data->save();

      return redirect()->action('HomeController@index');
    }

    public function edit_header($id)
    {
      $header = Header::findOrFail($id);
      return view('master/master_edit')->with('header', $header);
    }

    public function update_header(Request $request)
    {
      $id = $request->get('header_id');
      if($request->hasFile('avatar'))
      {
      $avatar = $request->file('avatar');
      $filename = time() . '.' . $avatar->getClientOriginalExtension();
      Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/' . $filename ) );
      $header = Header::findOrFail($id);
      $header->update($request->all());
      $header->image = $filename;
      $header->save();
      }
        $header = Header::findOrFail($id);
        $header->update($request->all());
        $header->save();
        return back();
    }

    public function block_header(Request $request,$id)
    {
      $header = Header::findOrFail($id);
      if($header->status == '1' )
        $header->update(['status' => '0']);
      else
        $header->update(['status' => '1','comment'=>null]);
      return back();
    }

    public function master_showadmin(Request $request, $id)
    {
        $NUM_PAGE = 5;
        $admins = Admin::where('header_id',$id)
                       ->orderBy('updated_at','desc')
                       ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        $header = Header::findOrFail($id);
        return view('master/master_showadmin')->with('admins',$admins)
                                            ->with('header',$header)
                                            ->with('page',$page)
                                            ->with('NUM_PAGE',$NUM_PAGE);
    }
    public function master_showarea(Request $request, $id)
    {
        $NUM_PAGE = 5;
        $areas = Area::where('admin_id',$id)
                      ->orderBy('updated_at','desc')
                      ->paginate($NUM_PAGE);
        $scores = DB::select('SELECT `score`,`area_id` FROM `scores`');
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        $admin = Admin::findOrfail($id);
        $header= Header::findOrfail($admin->header_id);
        return view('master/master_showarea')->with('areas',$areas)
                                             ->with('header',$header)
                                             ->with('page',$page)
                                             ->with('NUM_PAGE',$NUM_PAGE)
                                             ->with('scores',$scores);
    }

    public function search(Request $request)
    {
      $NUM_PAGE = 5;
      $key = $request->get('key');
      $headers = Header::where('header_name','like','%'.$key.'%')
                      ->orderBy('updated_at','desc')
                      ->paginate($NUM_PAGE);
      $page = $request->input('page');
      $page = ($page != null)?$page:1;

      return view('master/master_home')->with('headers',$headers)
                                       ->with('page',$page)
                                       ->with('NUM_PAGE',$NUM_PAGE);
      }

      public function score_total(Request $request)
      {
        $NUM_PAGE = 5;
        $headers = Header::where('master_id',Auth::user()->id)
                         ->orderBy('updated_at','desc')
                         ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;

          return view('master/master_total')->with('headers',$headers)
                                           ->with('page',$page)
                                           ->with('NUM_PAGE',$NUM_PAGE);

      }

      public function block(Request $request,$id)
      {
        $note = $request->note;
        if($note!=null){
        $header = Header::findOrFail($id);
        $header->update(['status' => '0','comment' => $note]);
          return back();
        }
        else{
          return back();
        }
      }

}
