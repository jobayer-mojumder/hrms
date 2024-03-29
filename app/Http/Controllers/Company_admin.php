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
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Image;
use App\User;
use App\Leave;
use App\Settings;
use App\Working_day;
use App\Holiday;

class Company_admin extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function check_user()
    {
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

    public function leave(Request $request)
    {
        if (!$this->check_user()) {
            redirect('logout');
        } else {
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
        if ($this->check_user()) {
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
        if ($this->check_user()) {
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

    public function settings(Request $request)
    {
        if (!$this->check_user()) {
            redirect('logout');
        } else {
            if ($request->isMethod('GET')) {
                $data['settings'] = Settings::all()->first();
                return view('hrms.company.settings', $data);
            } elseif ($request->isMethod('POST')) {
                $settings = Settings::all()->first();

                $settings->name = $request->input('name');
                $settings->address = $request->input('address');
                $settings->phone = $request->input('phone');
                $settings->email = $request->input('email');
                $settings->fax = $request->input('fax');
                $settings->website = $request->input('website');

                if (Input::hasFile('logo')) {
                    $logo = $request->file('logo');
                    $logoname = time() . '_' . $logo->getClientOriginalname();
                    $thumb = 'thumb_' . $logoname;

                    $destinationPath = 'public/assets/company';
                    $img = Image::make($logo->getRealPath())->resize(230, 50);

                    $img->save($destinationPath . '/' . $thumb);
                    $logo->move($destinationPath, $logoname);
                    $logo = $logoname;
                    $thumb = $thumb;
                    $path = 'public/assets/company/';

                    if ($settings->logo) {
                        $delete = $settings->logo_path . $settings->logo;
                        $delete2 = $settings->logo_path . $settings->thumb;
                        if (File::exists($delete)) {
                            unlink($delete);
                        }
                        if (File::exists($delete2)) {
                            unlink($delete2);
                        }
                    }
                    $settings->logo = $logo;
                    $settings->thumb = $thumb;
                    $settings->logo_path = $path;
                }

                if ($settings->update()) {
                    Session::put('settings', $settings);
                    $request->session()->flash('smsg', 'Settings info edited!');
                    return redirect()->route('settings');
                } else {
                    $request->session()->flash('emsg', 'Settings update failed!');
                    return redirect()->route('settings');
                }
            }
        }
    }

    public function working(Request $request)
    {
        if (!$this->check_user()) {
            redirect('logout');
        } else {
            if ($request->isMethod('GET')) {
                $data['working'] = Working_day::all();
                return view('hrms.company.working', $data);
            } elseif ($request->isMethod('POST')) {
                $days = $request->input('day');
                $data = Working_day::all();

                foreach ($data as $row){
                    if (array_key_exists($row->id, $days)){
                        $working = Working_day::find($row->id);
                        $working->status = 1;
                        $working->update();
                    }else{
                        $working = Working_day::find($row->id);
                        $working->status = 0;
                        $working->update();
                    }
                }

                $request->session()->flash('smsg', 'Working day info updated successfully!');
                return redirect()->route('working');

            }
        }
    }

    public function holiday(Request $request)
    {
        if (!$this->check_user()) {
            redirect('logout');
        } else {
            $data['holidays'] = Holiday::all();
            return view('hrms.holiday.holidayList', $data);
        }
    }

    public function holiday_add(Request $request)
    {
        if (!$this->check_user()) {
            return redirect()->route('login');
        } else {
            if ($request->isMethod('get')) {
                return view('hrms.holiday.holidayAdd');

            } elseif ($request->isMethod('post')) {

                $request->validate([
                    'name' => 'required|string|max:255',
                    'start_date' => 'required',
                    'end_date' => 'required',
                    'publish' => 'required',
                ]);

                $holiday = new Holiday();
                $holiday->name = $request->input('name');
                $holiday->start_date = $request->input('start_date').' 00:00:00';
                $holiday->end_date = $request->input('end_date').' 23:59:00';
                $holiday->publish = $request->input('publish');

                if ($holiday->save()) {
                    $request->session()->flash('smsg', 'New Holiday added!');
                    return redirect()->route('holiday');
                } else {
                    $request->session()->flash('emsg', 'Failed to add new Holiday');
                    return redirect()->route('holiday_add');
                }

            } else {
                return view('auth.login');
            }
        }
    }

    public function holiday_edit(Request $request, $id)
    {
        if ($this->check_user()) {
            if ($request->isMethod('get')) {

                $data['holiday'] = Holiday::find($id);

                return view('hrms.holiday.holidayEdit', $data);
            } else {

                $request->validate([
                    'name' => 'required|string|max:255',
                    'start_date' => 'required',
                    'end_date' => 'required',
                    'publish' => 'required',
                ]);

                $holiday = Holiday::find($id);
                $holiday->name = $request->input('name');
                $holiday->start_date = $request->input('start_date').' 00:00:00';
                $holiday->end_date = $request->input('end_date').' 23:59:00';
                $holiday->publish = $request->input('publish');

                if ($holiday->update()) {
                    $request->session()->flash('smsg', 'Holiday info edited!');
                    return redirect()->route('holiday');
                } else {
                    $request->session()->flash('emsg', 'Failed to edit Holiday info');
                    return redirect()->route('holiday_edit', ['id' => $id]);
                }
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function holiday_delete(Request $request, $id)
    {
        if ($this->check_user()) {
            if ($id) {
                $holiday = Holiday::find($id);
                if ($holiday->delete()) {
                    $request->session()->flash('smsg', 'Holiday deleted!');
                    return redirect()->route('holiday');
                } else {
                    $request->session()->flash('emsg', 'Failed to delete Holiday info');
                    return redirect()->route('holiday');
                }
            }
        } else {
            return redirect()->route('login');
        }
    }

}