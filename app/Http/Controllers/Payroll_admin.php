<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Payroll;
use App\Department;
use App\User;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Image;


class Payroll_admin extends Controller
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

    public function payroll(Request $request)
    {
        if (!$this->check_user()) {
            return redirect()->route('login');
        } else {
            $payrolls = Payroll::all();
            return view('hrms.payroll.payrollList', ['payrolls' => $payrolls]);
        }
    }

    public function payroll_add(Request $request)
    {
        if (!$this->check_user()) {
            return redirect()->route('login');
        } else {
            if ($request->isMethod('POST')) {
                $request->validate([
                    'employee' => 'required|int',
                ]);
                $employee_id = $request->input('employee');

                $payroll = Payroll::where('emp_id', $employee_id)->first();

                if (count($payroll)) {
                    $request->session()->flash('emsg', 'Payroll already exists for this employee!');
                    return redirect()->route('payroll_add');
                } else {
                    $payroll = new Payroll();
                    $payroll->basic_salary = $request->input('basic_salary');
                    $payroll->house_rent_allowance = $request->input('house_rent_allowance');
                    $payroll->medical_allowance = $request->input('medical_allowance');
                    $payroll->special_allowance = $request->input('special_allowance');
                    $payroll->fuel_allowance = $request->input('fuel_allowance');
                    $payroll->phone_bill_allowance = $request->input('phone_bill_allowance');
                    $payroll->other_allowance = $request->input('other_allowance');
                    $payroll->tax_deduction = $request->input('tax_deduction');
                    $payroll->provident_fund = $request->input('provident_fund');
                    $payroll->other_deduction = $request->input('other_deduction');
                    $payroll->employment_type = $request->input('employment_type');
                    $payroll->emp_id = $employee_id;

                    if ($payroll->save()) {
                        $request->session()->flash('smsg', 'Payroll added Successfully!');
                        return redirect()->route('payroll');
                    } else {
                        $request->session()->flash('emsg', 'Payroll add failed!');
                        return redirect()->route('payroll_add');
                    }
                }

            } else {
                $departments = Department::all();
                return view('hrms.payroll.payrollAdd', ['departments' => $departments]);
            }
        }
    }

    public function payroll_delete(Request $request, $id)
    {
        if (!$this->check_user()) {
            return redirect()->route('login');
        } else {
            $payroll = Payroll::find($id);
            if ($payroll->delete()) {
                $request->session()->flash('smsg', 'Payroll deleted Successfully!');
                return redirect()->route('payroll');
            } else {
                $request->session()->flash('emsg', 'Payroll deleted Failed!');
                return redirect()->route('payroll');
            }
        }
    }

    public function payroll_edit(Request $request, $id)
    {
        if (!$this->check_user()) {
            return redirect()->route('login');
        } else {
            if ($request->isMethod('POST')) {

            } else {

                $payroll = Payroll::find($id);
                return view('hrms.payroll.payrollEdit', ['payroll' => $payroll]);
            }
        }
    }

}
