<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Payroll;
use App\Department;
use App\User;
use App\Payment_type;
use App\Payment;
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

    public function payment(Request $request)
    {
        if (!$this->check_user()) {
            return redirect()->route('login');
        } else {
            $data['payments'] = Payment::all();
            return view('hrms.payment.paymentList', $data);
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
                return view('hrms.payment.paymentAdd', $data);

            } elseif ($request->isMethod('POST')) {
                $request->validate([
                    'payment_date' => 'required|string',
                    'employee' => 'required|int',
                    'payment_type' => 'required|int',
                ]);

                $employee_id = $request->input('employee');
                $payroll = Payroll::where('emp_id', $employee_id)->first();

                if (count($payroll)) {
                    $payment = new Payment();
                    $payment->emp_id = $payroll->emp_id;
                    $payment->basic_salary = $payroll->basic_salary;
                    $payment->house_rent_allowance = $payroll->house_rent_allowance;
                    $payment->medical_allowance = $payroll->medical_allowance;
                    $payment->special_allowance = $payroll->special_allowance;
                    $payment->fuel_allowance = $payroll->fuel_allowance;
                    $payment->phone_bill_allowance = $payroll->phone_bill_allowance;
                    $payment->other_allowance = $payroll->other_allowance;
                    $payment->tax_deduction = $payroll->tax_deduction;
                    $payment->provident_fund = $payroll->provident_fund;
                    $payment->other_deduction = $payroll->other_deduction;
                    $payment->total_allowance = $payroll->total_allowance;
                    $payment->total_deduction = $payroll->total_deduction;
                    $payment->gross_salary = $payroll->gross_salary;
                    $payment->net_salary = $payroll->net_salary;
                    $payment->bonus = $request->input('bonus');
                    $payment->fine_deduction = $request->input('fine_deduction');
                    $payment->total_payable = ($payment->bonus + $payment->net_salary) - $payment->fine_deduction;
                    $payment->payment_amount = $request->input('payment_amount');
                    $payment->payment_type = $request->input('payment_type');
                    $payment->payment_due = $payment->total_payable - $payment->payment_amount;
                    $payment->payment_for_month = date('Y-m', strtotime($request->input('payment_date')));
                    $payment->comments = $request->input('comments');

                    if ($payment->save()) {
                        $request->session()->flash('smsg', 'Payment save successfully!');
                        return redirect()->route('payment');
                    } else {
                        $request->session()->flash('emsg', 'Payment failed!');
                        $data['departments'] = Department::all();
                        $data['payment_types'] = Payment_type::all();
                        return view('hrms.payment.paymentAdd', $data);
                    }
                } else {
                    $request->session()->flash('emsg', 'Payroll not found for this employee!');
                    $data['departments'] = Department::all();
                    $data['payment_types'] = Payment_type::all();
                    return view('hrms.payment.paymentAdd', $data);
                }

            }
        }
    }

    public function payment_edit(Request $request, $id)
    {
        if (!$this->check_user()) {
            return redirect()->route('login');
        } else {
            if ($request->isMethod('GET')) {

                $data['payment'] = Payment::find($id);
                $data['payment_types'] = Payment_type::all();

                if ($data['payment']){
                    return view('hrms.payment.paymentEdit', $data);
                }else{
                    $request->session()->flash('emsg', 'Payment not found!');
                    return redirect()->route('payment');
                }

            } elseif ($request->isMethod('POST')) {
                $request->validate([
                    'payment_date' => 'required|string',
                    'payment_type' => 'required|int',
                ]);

                $payment = Payment::find($id);
                $payroll = Payroll::where('emp_id', $payment->emp_id)->first();

                if($payroll){
                    $payment->bonus = $request->input('bonus');
                    $payment->fine_deduction = $request->input('fine_deduction');
                    $payment->total_payable = ($payment->bonus + $payment->net_salary) - $payment->fine_deduction;
                    $payment->payment_amount = $request->input('payment_amount');
                    $payment->payment_type = $request->input('payment_type');
                    $payment->payment_due = $payment->total_payable - $payment->payment_amount;
                    $payment->payment_for_month = date('Y-m', strtotime($request->input('payment_date')));
                    $payment->comments = $request->input('comments');

                    if ($payment->update()){
                        $request->session()->flash('smsg', 'Payment updated successfully!');
                        return redirect()->route('payment');
                    }else{
                        $request->session()->flash('emsg', 'Payment update failed!');
                        return redirect()->route('payment_edit', ['id'=>$id]);
                    }
                }else{
                    $request->session()->flash('emsg', 'Payroll not found for this employee!');
                    return redirect()->route('payment');
                }
            }
        }
    }

    public function payment_delete(Request $request, $id)
    {
        if (!$this->check_user()) {
            return redirect()->route('login');
        } else {
            $payment = Payment::find($id);
            if ($payment->delete()) {
                $request->session()->flash('smsg', 'Payment deleted Successfully!');
                return redirect()->route('payment');
            } else {
                $request->session()->flash('emsg', 'Payment deleted Failed!');
                return redirect()->route('payment');
            }
        }
    }

    public function payment_view(Request $request, $id)
    {
        if (!$this->check_user()) {
            return redirect()->route('login');
        } else {
            $payment = Payment::find($id);

            if (count($payment)) {
                return view('hrms.payment.paymentView', ['payment' => $payment]);
            } else {
                $request->session()->flash('emsg', 'Payment not found!');
                return redirect()->route('payment');
            }
        }
    }

}
