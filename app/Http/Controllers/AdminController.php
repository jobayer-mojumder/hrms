<?php

/**
 * @Author: Jobayer Mojumder
 * @Date:   2017-09-19 10:32:14
 * @Last Modified by:   jobayermojumder
 * @Last Modified time: 2018-09-10 11:37:26
 */

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Image;
use app\User;
use App\Settings;
use App\Holiday;
use App\Event;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     * by-Optimus
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $settings = Settings::all()->first();
        Session::put('settings', $settings);
    }

    public function check_user()
    {
        if (Auth::check()) {
            if (Auth::user()->group == 1 || Auth::user()->group == 2) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function index(Request $request)
    {

        if (Auth::user()->group == 3) {
            return redirect()->route('empHome');
        } else {
            if (!$this->check_user()) {
                redirect('logout');
            } else {
                $data['holidays'] = Holiday::where('publish', 1)->get();
                $data['events'] = Event::where('publish', 1)->get();
                return view('hrms.home', $data);
            }
        }

    }

    public function userPassword(Request $request)
    {
        if (!$this->check_user()) {
            redirect('logout');
        } else {
            if ($request->isMethod('get')) {
                return view('hrms.userPassword');
            } elseif ($request->isMethod('post')) {
                $request->validate([
                    'password' => 'required|string|min:6|confirmed',
                ]);

                $postdata['password'] = bcrypt($request->input('password'));

                $id = Auth::user()->id;

                $result = DB::table('users')->where('id', $id)->update($postdata);
                if ($result) {
                    $request->session()->flash('smsg', 'User Password Change was Successful!');
                    return redirect()->route('adminList');
                } else {
                    $request->session()->flash('emsg', 'User Password Change was Un-Successful!');
                    return redirect()->route('adminList');
                }
            }
        }
    }

    /*---------------------------- user View  -----------------------------*/

    public function userlist(Request $request)
    {
        if (!$this->check_user()) {
            redirect('logout');
        } else {
            $user = User::whereIn('group', array(1, 2))->paginate(10);
            return view('hrms.userlist', ['user' => $user]);
        }
    }

    /*---------------------- user add --------------------*/

    public function userAdd(Request $request)
    {
        if (!$this->check_user()) {
            redirect('logout');
        } else {
            if ($request->isMethod('get')) {
                return view('hrms.userAdd');

            } elseif ($request->isMethod('post')) {

                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'group' => 'required|string',
                    'status' => 'required|integer',
                    'password' => 'required|string|min:6|confirmed',
                ]);

                $postdata['name'] = $request->input('name');
                $postdata['email'] = $request->input('email');
                $postdata['group'] = $request->input('group');
                $postdata['status'] = $request->input('status');
                $postdata['password'] = bcrypt($request->input('password'));
                if (Input::hasFile('image')) {

                    $image = $request->file('image');
                    $imagename = time() . '_' . $image->getClientOriginalname();
                    $thumb = 'thumb_' . $imagename;

                    $destinationPath = 'public/assets/user';
                    $img = Image::make($image->getRealPath())->resize(150, 150);

                    $img->save($destinationPath . '/' . $thumb);
                    $image->move($destinationPath, $imagename);
                    $postdata['image'] = $imagename;
                    $postdata['thumb'] = $thumb;
                    $postdata['image_path'] = 'public/assets/user/';
                }

                $result = DB::table('users')->insert($postdata);
                if ($result) {
                    $request->session()->flash('msg', 'User Insert was Successful!');
                    return redirect()->route('adminList');
                } else {
                    $request->session()->flash('msg', 'User Insert was Un-Successful!');
                    return redirect()->route('adminAdd');
                }
            } else {
                return view('auth.login');
            }
        }
    }

    /*---------------------------- user Edit  ------------------------------*/
    public function userEdit(Request $request, $id)
    {
        if (!$this->check_user()) {
            redirect('logout');
        } else {
            if ($request->isMethod('get')) {
                if ($id) {
                    $user = DB::table('users')->where('id', $id)->get();
                    return view('hrms.userEdit', ['user' => $user]);
                } else {
                    return redirect()->route('adminList');
                }
            } elseif ($request->isMethod('post')) {

                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255',
                    'group' => 'required|string',
                    'status' => 'required|integer',
                ]);

                $postdata['name'] = $request->input('name');
                $postdata['email'] = $request->input('email');
                $postdata['group'] = $request->input('group');
                $postdata['status'] = $request->input('status');

                if (Input::hasFile('image')) {
                    $image = $request->file('image');
                    $input['imagename'] = time() . '_' . $image->getClientOriginalname();
                    $destinationPath = 'public/assets/user';
                    $img = Image::make($image->getRealPath())->resize(150, 150);

                    $thumb = 'thumb_' . $input['imagename'];
                    $img->save($destinationPath . '/' . $thumb);
                    $image->move($destinationPath, $input['imagename']);
                    $postdata['image'] = $input['imagename'];
                    $postdata['thumb'] = $thumb;
                    $postdata['image_path'] = 'public/assets/user/';

                    $result = DB::table('users')->select('image', 'thumb', 'image_path')->where('id', $id)->get();
                    $result = $result->shift();
                    $image = $result->image_path . $result->image;
                    $thumb = $result->image_path . $result->thumb;
                    if (File::exists($image)) {
                        unlink($image);
                    }
                    if (File::exists($thumb)) {
                        unlink($thumb);
                    }

                }

                $result = DB::table('users')->where('id', $id)->update($postdata);
                if ($result) {
                    $request->session()->flash('smsg', 'User Update was Successful!');
                    return redirect()->route('adminList');
                } else {
                    $request->session()->flash('emsg', 'User Update was Un-Successful!');
                    return redirect()->route('adminEdit', ['id' => $id]);
                }
            } else {
                return view('auth.login');
            }
        }
    }

    /*------------------------- user delete --------------------------*/

    public function userDelete(Request $request, $id)
    {
        if (!$this->check_user()) {
            redirect('logout');
        } else {
            $image = DB::table('users')->select('image', 'image_path', 'thumb')->where('id', $id)->get();
            //$image = $image->shift();

            $result = DB::table('users')->select('image', 'thumb', 'image_path')->where('id', $id)->get();
            $delete = DB::table('users')->where('id', $id)->delete();
            if ($delete) {
                $result = $result->shift();
                $image = $result->image_path . $result->image;
                $thumb = $result->image_path . $result->thumb;
                if (File::exists($image)) {
                    unlink($image);
                }
                if (File::exists($thumb)) {
                    unlink($thumb);
                }

                $request->session()->flash('smsg', 'User Delete was Successful!');
                return redirect()->route('adminList');
            } else {
                $request->session()->flash('emsg', 'User Delete was Unsuccessful!');
                return redirect()->route('adminList');
            }
        }
    }

    /*---------------------- user status change ---------------*/

    public function userStatus(Request $request, $id, $value)
    {
        if (!$this->check_user()) {
            redirect('logout');
        } else {
            if ($value) {
                $result = $this->statusChange('users', $id, '0');
            } else {
                $result = $this->statusChange('users', $id, '1');
            }
            if ($result) {
                $request->session()->flash('msg', 'Status Change was Successful!');
                return redirect()->route('adminList');
            } else {
                $request->session()->flash('msg', 'Status Change was Un-Successful!');
                return redirect()->route('adminList');
            }
        }
    }

    /*---------------------- status change main function ---------------*/

    public function statusChange(Request $request, $table, $id, $value)
    {
        if (!$this->check_user()) {
            redirect('logout');
        } else {
            $postdata['status'] = $value;
            $result = DB::table($table)->where('id', $id)->update($postdata);
            if ($result) {
                return '1';
            } else {
                return '0';
            }
        }
    }


    /*----------------------- Get file -------------*/
    public function getFile(Request $request, $location)
    {
        if (!$this->check_user()) {
            redirect('logout');
        } else {
            $fullpath = $location;
            return response()->download($fullpath, null, [], null);
        }
    }
}
