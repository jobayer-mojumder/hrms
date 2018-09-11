<?php

namespace App\Http\Controllers;

use App\Employee;
use  App\Payroll;
use App\User;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Image;


class Payroll_admin extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function check_user() {
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
    public function payroll(Request $request){
        if (!$this->check_user()){
            return redirect()->route('login');
        }else{
            $payrolls = Payroll::all();
            return view('hrms.payroll.payrollList', ['payrolls' => $payrolls]);
        }
    }

}
