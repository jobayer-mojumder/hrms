<?php
/**
 * Created by PhpStorm.
 * User: jobayer
 * Date: 9/16/18
 * Time: 1:39 PM
 */

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Image;
use App\User;
use App\Leave;

class Company_admin extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function check_user() {
        if (Auth::check()) {
            if (Auth::user()->group == 1) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function leave(Request $request){
        if (!$this->check_user()) {
            redirect('logout');
        }else{
            $data['leaves'] = Leave::all();
            return view('hrms.leave.leaveList', $data);
        }
    }

    public function leave_add(Request $request)
    {
        if (!$this->check_user()) {
            return redirect()->route('login');
        } else {
            if ($request->isMethod('get')) {
                return view('hrms.leave.leaveAdd');

            } elseif ($request->isMethod('post')) {

                $request->validate([
                    'name' => 'required|string|max:255',
                    'days' => 'required|integer',
                ]);

                $leave = new Leave();
                $leave->name = $request->input('name');
                $leave->days = $request->input('days');

                if ($leave->save()) {
                    $request->session()->flash('smsg', 'New Leave added!');
                    return redirect()->route('leave');
                } else {
                    $request->session()->flash('emsg', 'Failed to add new Leave');
                    return redirect()->route('leave_add');
                }

            } else {
                return view('auth.login');
            }
        }
    }

    public function leave_edit(Request $request, $id)
    {
        if (Auth::check()) {
            if ($request->isMethod('get')) {

                $data['leave'] = Leave::find($id);

                return view('hrms.leave.leaveEdit', $data);
            } else {

                $request->validate([
                    'name' => 'required|string|max:255',
                    'days' => 'required|integer',
                ]);

                $leave = Leave::find($id);
                $leave->name = $request->input('name');
                $leave->days = $request->input('days');

                if ($leave->update()) {
                    $request->session()->flash('smsg', 'Leave info edited!');
                    return redirect()->route('leave');
                } else {
                    $request->session()->flash('emsg', 'Failed to edit Leave info');
                    return redirect()->route('leave_edit', ['id' => $id]);
                }
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function leave_delete(Request $request, $id)
    {
        if (Auth::check()) {
            if ($id) {
                $leave = Leave::find($id);
                if ($leave->delete()) {
                    $request->session()->flash('smsg', 'Leave deleted!');
                    return redirect()->route('leave');
                } else {
                    $request->session()->flash('emsg', 'Failed to delete Leave info');
                    return redirect()->route('leave');
                }
            }
        } else {
            return redirect()->route('login');
        }
    }

}