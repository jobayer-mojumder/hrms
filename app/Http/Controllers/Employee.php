<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Settings;
use App\Holiday;
use App\Event;

class Employee extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $settings = Settings::all()->first();
        Session::put('settings', $settings);
    }

    public function check_user()
    {
        if (Auth::check()) {
            if (Auth::user()->group == 3) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function index()
    {
        if (!$this->check_user()) {
            return redirect()->route('login');
        } else {
            $data['holidays'] = Holiday::where('publish', 1)->get();
            $data['events'] = Event::where('publish', 1)->get();
            return view('employee.home', $data);
        }
    }
}
