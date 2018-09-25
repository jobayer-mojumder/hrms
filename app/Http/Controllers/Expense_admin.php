<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Expense;
use  App\Department;

class Expense_admin extends Controller
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

    public function expense(Request $request)
    {
        if (!$this->check_user()) {
            return redirect()->route('login');
        } else {
            $data['expenses'] = Expense::all();
            return view('hrms.expense.expenseList', $data);
        }
    }

    public function expense_add(Request $request)
    {
        if (!$this->check_user()) {
            return redirect()->route('login');
        } else {
            if ($request->isMethod('GET')) {
                $data['departments'] = Department::all();
                return view('hrms.expense.expenseAdd', $data);

            } elseif ($request->isMethod('POST')) {
                $request->validate([
                    'title' => 'required|string|max:255',
                    'emp_id' => 'employee',
                    'date' => 'required',
                    'amount' => 'required',
                    'publish' => 'required|int',
                ]);

                $expense = new Expense();
                $expense->title = $request->input('title');
                $expense->emp_id = $request->input('employee');
                $expense->amount = $request->input('amount');
                $expense->date = $request->input('date');
                $expense->comments = $request->input('comments');
                $expense->status = $request->input('publish');

                if ($expense->save()) {
                    $request->session()->flash('smsg', 'Expense added successfully!');
                    return redirect()->route('expense');
                } else {
                    $request->session()->flash('emsg', 'Expense add failed!!!');
                    $data['departments'] = Department::all();
                    return view('hrms.expense.expenseAdd', $data);
                }
            }
        }
    }


    public function expense_edit(Request $request, $id)
    {
        if (!$this->check_user()) {
            return redirect()->route('login');
        } else {
            if ($request->isMethod('GET')) {
                $data['departments'] = Department::all();
                $data['expense'] = Expense::find($id);
                if ($data['expense']) {
                    return view('hrms.expense.expenseEdit', $data);
                } else {
                    $request->session()->flash('emsg', 'Expense not found!!!');
                    return redirect()->route('expense');
                }

            } elseif ($request->isMethod('POST')) {
                $request->validate([
                    'title' => 'required|string|max:255',
                    'emp_id' => 'employee',
                    'date' => 'required',
                    'amount' => 'required',
                    'publish' => 'required|int',
                ]);

                $expense = Expense::find($id);
                $expense->title = $request->input('title');
                $expense->emp_id = $request->input('employee');
                $expense->amount = $request->input('amount');
                $expense->date = $request->input('date');
                $expense->comments = $request->input('comments');
                $expense->status = $request->input('publish');

                if ($expense->update()) {
                    $request->session()->flash('smsg', 'Expense updated successfully!');
                    return redirect()->route('expense');
                } else {
                    $request->session()->flash('emsg', 'Expense update failed!!!');
                    $data['expense'] = Expense::find($id);

                    if ($data['expense']) {
                        $data['departments'] = Department::all();
                        return view('hrms.expense.expenseEdit', $data);
                    } else {
                        $request->session()->flash('emsg', 'Expense not found!!!');
                        return redirect()->route('expense');
                    }
                }
            }
        }
    }

    public function expense_delete(Request $request, $id)
    {
        if (Auth::check()) {
            if ($id) {
                $expense = Expense::find($id);
                if ($expense->delete()) {
                    $request->session()->flash('smsg', 'Expense deleted!!!');
                    return redirect()->route('expense');
                } else {
                    $request->session()->flash('emsg', 'Failed to delete Expense!!!');
                    return redirect()->route('expense');
                }
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function expense_view(Request $request, $id)
    {
        if (Auth::check()) {
            if ($id) {
                $data['expense'] = Expense::find($id);
                if ($data['expense']) {
                    return view('hrms.expense.expenseView', $data);
                } else {
                    $request->session()->flash('emsg', 'Expense not found!!!');
                    return redirect()->route('expense');
                }
            }
        } else {
            return redirect()->route('login');
        }
    }

}
