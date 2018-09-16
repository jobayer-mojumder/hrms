<?php
/**
 * Created by PhpStorm.
 * User: jobayer
 * Date: 9/14/18
 * Time: 2:19 PM
 */

namespace App\Http\Controllers;

use App\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Department;


class Notice_admin extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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

    public function notice_add(Request $request)
    {
        if (!$this->check_user()) {
            return redirect()->route('login');
        } else {
            if ($request->isMethod('GET')) {
                $data['departments'] = Department::all();
                return view('hrms.notice.noticeAdd', $data);
            } elseif ($request->isMethod('POST')) {
                $request->validate([
                    'department_id' => 'required|int',
                    'title' => 'required|string|max:255',
                    'short_details' => 'required',
                    'details' => 'required',
                    'publish' => 'required|int',
                ]);

                $notice =new Notice();
                $notice->department_id = $request->input('department_id');
                $notice->title = $request->input('title');
                $notice->short_details = $request->input('short_details');
                $notice->details = $request->input('details');
                $notice->publish = $request->input('publish');

                if ($notice->save()){
                    $request->session()->flash('smsg', 'Notice added successfully!');
                    return redirect()->route('notice');
                } else {
                    $request->session()->flash('emsg', 'Notice add failed!!!');
                    $data['departments'] = Department::all();
                    return view('hrms.notice.noticeAdd', $data);
                }
            }
        }
    }

}