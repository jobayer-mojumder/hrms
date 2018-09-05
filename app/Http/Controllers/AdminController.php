<?php

/**
 * @Author: Jobayer Mojumder
 * @Date:   2017-09-19 10:32:14
 * @Last Modified by:   jobayer
 * @Last Modified time: 2018-09-04 15:04:27
 */

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Image;

class AdminController extends Controller {
	/**
	 * Create a new controller instance.
	 * by-Optimus
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function index() {
		if (Auth::check()) {
			return view('hrms.home');
		} else {
			redirect('logout');
		}

	}

	/*---------------------------- user View  -----------------------------*/

	public function userlist() {
		if (!Auth::check()) {
			redirect('logout');
		} else {
			$user = DB::table('users')->paginate(10);
			return view('hrms.userlist', ['user' => $user]);
		}
	}

	/*---------------------- user add --------------------*/

	public function userAdd(Request $request) {
		if (!Auth::check()) {
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
					$request->session()->flash('msg', 'User Insert was <span style="color:Green;">Successful!</span>');
					return redirect('/userlist');
				} else {
					$request->session()->flash('msg', 'User Insert was <span style="color:red;">Un-Successful!</span>');
					return redirect('/user_edit');
				}
			} else {
				return view('auth.login');
			}
		}
	}

	/*---------------------------- user Edit  ------------------------------*/
	public function userEdit(Request $request, $id) {
		if (!Auth::check()) {
			redirect('logout');
		} else {
			if ($request->isMethod('get')) {
				if ($id) {
					$user = DB::table('users')->where('id', $id)->get();
					return view('hrms.userEdit', ['user' => $user]);
				} else {
					$this->userlist();
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
					$request->session()->flash('msg', 'User Update was <span style="color:Green;">Successful!</span>');
					return redirect('/userlist');
				} else {
					$request->session()->flash('msg', 'User Update was <span style="color:red;">Un-Successful!</span>');
					return redirect('/userEdit/' . $id);
				}
			} else {
				return view('auth.login');
			}
		}
	}

	/*------------------------- user delete --------------------------*/

	public function userDelete(Request $request, $id) {
		if (!Auth::check()) {
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

				$request->session()->flash('msg', 'User Delete was <span style="color:Green;">Successful!</span>');
				return redirect('/userlist');
			} else {
				$request->session()->flash('msg', 'User Delete was Unsuccessful!');
				return redirect('/userlist');
			}
		}
	}

	/*---------------------- user status change ---------------*/

	public function userStatus(Request $request, $id, $value) {
		if ($value) {
			$result = $this->statusChange('users', $id, '0');
		} else {
			$result = $this->statusChange('users', $id, '1');
		}
		if ($result) {
			$request->session()->flash('msg', 'Status Change was <span style="color:Green;">Successful!</span>');
			return redirect('/userlist');
		} else {
			$request->session()->flash('msg', 'Status Change was <span style="color:red;">Un-Successful!</span>');
			return redirect('/userlist');
		}
	}

	/*---------------------- status change main function ---------------*/

	public function statusChange($table, $id, $value) {
		if (!Auth::check()) {
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
	public function getFile($location) {
		if (!Auth::check()) {
			redirect('logout');
		} else {
			$fullpath = $location;
			return response()->download($fullpath, null, [], null);
		}
	}
}
