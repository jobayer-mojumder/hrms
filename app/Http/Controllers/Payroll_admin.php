<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Payroll;
use App\Department;
use App\User;
use App\Payment_type;
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

                    $payroll->total_allowance = $payroll->house_rent_allowance + $payroll->medical_allowance + $payroll->special_allowance +
                        $payroll->fuel_allowance + $payroll->phone_bill_allowance + $payroll->other_allowance;
                    $payroll->total_deduction = $payroll->tax_deduction + $payroll->provident_fund + $payroll->other_deduction;

                    $payroll->gross_salary = $payroll->total_allowance + $payroll->basic_salary;
                    $payroll->net_salary = $payroll->gross_salary - $payroll->total_deduction;

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

                $payroll = Payroll::find($id);
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

                $payroll->total_allowance = $payroll->house_rent_allowance + $payroll->medical_allowance + $payroll->special_allowance +
                    $payroll->fuel_allowance + $payroll->phone_bill_allowance + $payroll->other_allowance;
                $payroll->total_deduction = $payroll->tax_deduction + $payroll->provident_fund + $payroll->other_deduction;

                $payroll->gross_salary = $payroll->total_allowance + $payroll->basic_salary;
                $payroll->net_salary = $payroll->gross_salary - $payroll->total_deduction;

                if ($payroll->update()) {
                    $request->session()->flash('smsg', 'Payroll updated Successfully!');
                    return redirect()->route('payroll');
                } else {
                    $request->session()->flash('emsg', 'Payroll update failed!');
                    return redirect()->route('payroll_edit', ['id' => $id]);
                }
            } else {
                $payroll = Payroll::find($id);
                return view('hrms.payroll.payrollEdit', ['payroll' => $payroll]);
            }
        }
    }

    public function payroll_view(Request $request, $id)
    {
        if (!$this->check_user()) {
            return redirect()->route('login');
        } else {
            $payroll = Payroll::find($id);

            if (count($payroll)) {
                return view('hrms.payroll.payrollView', ['payroll' => $payroll]);
            } else {
                $request->session()->flash('emsg', 'Payroll not found!');
                return redirect()->route('payroll');
            }
        }
    }

    public function employee_salary_info(Request $request)
    {
        if (!$this->check_user()) {
            return redirect()->route('login');
        } else {
            $emp_id = $request->emp_id;
            $payroll = Payroll::where('emp_id', $emp_id)->first();

            if (count($payroll)) {
                echo json_encode($payroll);
            } else {
                echo 0;
            }
        }
    }

    public function payment_add(Request $request)
    {
        if (!$this->check_user()) {
            return redirect()->route('login');
        } else {
            if ($request->isMethod('GET')) {

                $data['departments'] = Department::all();
                $data['payment_types'] = Payment_type::all();
                return view('hrms.payment.makePayment', $data);

            } elseif ($request->isMethod('POST')) {
                $request->validate([
                    'date' => 'required|string',
                    'employee' => 'required|int',
                    'payment_type' => 'required|int',
                ]);


            }
        }
    }

}
