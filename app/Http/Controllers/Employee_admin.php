<?php

namespace App\Http\Controllers;
use App\Bankinfo;
use App\Contactinfo;
use App\Department;
use App\Designation;
use App\Documentinfo;
use App\Employee;
use App\Officeinfo;
use App\User;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Image;

class Employee_admin extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function check_user() {
        if (Auth::check()) {
            if (Auth::user()->group != '1') {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function department() {
        if ($this->check_user()) {
            return redirect()->route('logout');
        } else {
            $departments = Department::all();
            return view('hrms.department.departmentList', ['departments' => $departments]);
        }
    }

    public function department_add(Request $request) {
        if ($this->check_user()) {
            return redirect()->route('logout');
        } else {
            if ($request->isMethod('get')) {
                return view('hrms.department.departmentAdd');

            } elseif ($request->isMethod('post')) {

                $request->validate([
                    'name' => 'required|string|max:255',
                ]);

                $department = new Department();
                $department->name = $request->input('name');
                $department->description = $request->input('description');

                if ($department->save()) {
                    $request->session()->flash('smsg', 'New Department added!');
                    return redirect()->route('department');
                } else {
                    $request->session()->flash('emsg', 'Failed to add new Department');
                    return redirect()->route('department_add');
                }

            } else {
                return view('auth.login');
            }
        }
    }

    public function department_edit(Request $request, $id) {
        if (Auth::check()) {
            if ($request->isMethod('get')) {

                $department = Department::find($id);

                return view('hrms.department.departmentEdit', ['department' => $department]);
            } else {

                $request->validate([
                    'name' => 'required|string|max:255',
                ]);

                $department = Department::find($id);
                $department->name = $request->input('name');
                $department->description = $request->input('description');

                if ($department->update()) {
                    $request->session()->flash('smsg', 'Department info edited!');
                    return redirect()->route('department');
                } else {
                    $request->session()->flash('emsg', 'Failed to edit Department info');
                    return redirect()->route('department_edit', ['id' => $id]);
                }
            }
        } else {
            return redirect()->route('logout');
        }
    }

    public function department_delete(Request $request, $id) {
        if (Auth::check()) {
            if ($id) {
                $department = Department::find($id);
                if ($department->delete()) {
                    $request->session()->flash('smsg', 'Department deleted!');
                    return redirect()->route('department');
                } else {
                    $request->session()->flash('emsg', 'Failed to delete Department info');
                    return redirect()->route('department');
                }
            }
        } else {
            return redirect()->route('logout');
        }
    }

    /*---------------- Designation ----------------*/
    public function designation() {
        if ($this->check_user()) {
            return redirect()->route('logout');
        } else {
            $designations = Designation::all();
            return view('hrms.designation.designationList', ['designations' => $designations]);
        }
    }

    public function designation_add(Request $request) {
        if ($this->check_user()) {
            return redirect()->route('logout');
        } else {
            if ($request->isMethod('get')) {
                $data['departments'] = Department::all();
                return view('hrms.designation.designationAdd', $data);

            } elseif ($request->isMethod('post')) {

                $request->validate([
                    'name' => 'required|string|max:255',
                    'department_id' => 'required|integer',
                    'rank' => 'required|integer',
                ]);

                $designation = new Designation();
                $designation->name = $request->input('name');
                $designation->rank = $request->input('rank');
                $designation->department_id = $request->input('department_id');
                $designation->description = $request->input('description');

                if ($designation->save()) {
                    $request->session()->flash('smsg', 'New Designation added!');
                    return redirect()->route('designation');
                } else {
                    $request->session()->flash('emsg', 'Failed to add new Designation');
                    return redirect()->route('designation_add');
                }

            } else {
                return view('auth.login');
            }
        }
    }

    public function designation_edit(Request $request, $id) {
        if (Auth::check()) {
            if ($request->isMethod('get')) {

                $data['designation'] = Designation::find($id);
                $data['departments'] = Department::all();

                return view('hrms.designation.designationEdit', $data);
            } else {

                $request->validate([
                    'name' => 'required|string|max:255',
                    'department_id' => 'required|integer',
                    'rank' => 'required|integer',
                ]);

                $designation = Designation::find($id);
                $designation->name = $request->input('name');
                $designation->rank = $request->input('rank');
                $designation->department_id = $request->input('department_id');
                $designation->description = $request->input('description');

                if ($designation->update()) {
                    $request->session()->flash('smsg', 'Designation info edited!');
                    return redirect()->route('designation');
                } else {
                    $request->session()->flash('emsg', 'Failed to edit Designation info');
                    return redirect()->route('designation_edit', ['id' => $id]);
                }
            }
        } else {
            return redirect()->route('logout');
        }
    }

    public function designation_delete(Request $request, $id) {
        if (Auth::check()) {
            if ($id) {
                $designation = Designation::find($id);
                if ($designation->delete()) {
                    $request->session()->flash('smsg', 'Designation deleted!');
                    return redirect()->route('designation');
                } else {
                    $request->session()->flash('emsg', 'Failed to delete Designation info');
                    return redirect()->route('designation');
                }
            }
        } else {
            return redirect()->route('logout');
        }
    }

//------------------employee functions start ---------------//
    public function employee() {
        if ($this->check_user()) {
            return redirect()->route('logout');
        } else {
            $data['employees'] = Employee::all();
            return view('hrms.employee.employeeList', $data);
        }
    }

    public function employee_add(Request $request) {
        if ($this->check_user()) {
            return redirect()->route('logout');
        } else {
            if ($request->isMethod('get')) {
                $data['departments'] = Department::all();
                return view('hrms.employee.employeeAdd', $data);

            } elseif ($request->isMethod('post')) {

                $request->validate([
                    'first_name' => 'required|string|max:255',
                    'last_name' => 'required|string|max:255',
                    'dob' => 'required|string|max:255',
                    'gender' => 'required|string|max:255',
                    'marital_status' => 'required|string|max:255',
                    'father_name' => 'required|string|max:255',
                    'nationality' => 'required|string|max:255',
                    'present_address' => 'required|string',
                    'city' => 'required|string|max:255',
                    'country' => 'required|string|max:255',
                    'mobile' => 'required|string|max:255',
                    'employee_id' => 'required|string|max:255',
                    'email' => 'required|string|max:255',
                    'designation' => 'required|string|max:255',
                ]);

                if (Input::hasFile('image')) {
                    $image = $request->file('image');
                    $imagename = time() . '_' . $image->getClientOriginalname();
                    $thumb = 'thumb_' . $imagename;

                    $destinationPath = 'public/assets/employee';
                    $img = Image::make($image->getRealPath())->resize(150, 150);

                    $img->save($destinationPath . '/' . $thumb);
                    $image->move($destinationPath, $imagename);
                    $image = $imagename;
                    $thumb = $thumb;
                    $path = 'public/assets/employee/';
                } else {
                    $image = '';
                    $thumb = '';
                    $path = '';
                }

                $user = new User();
                $user->name = $request->input('first_name') . ' ' . $request->input('last_name');
                $user->email = $request->input('email');
                $user->password = bcrypt($request->input('mobile'));
                $user->group = '2';
                $user->status = '1';
                $user->image = $image;
                $user->thumb = $thumb;
                $user->image_path = $path;

                if ($user->save()) {
                    $user_id = $user->id;

                    $employee = new Employee();

                    $employee->first_name = $request->input('first_name');
                    $employee->last_name = $request->input('last_name');
                    $employee->dob = $request->input('dob');
                    $employee->gender = $request->input('gender');
                    $employee->marital_status = $request->input('marital_status');
                    $employee->father_name = $request->input('father_name');
                    $employee->nationality = $request->input('nationality');
                    $employee->nid = $request->input('nid');
                    $employee->photo = $image;
                    $employee->photo_path = $path;
                    $employee->user_id = $user_id;
                    $employee->save();

                    $emp_id = $employee->id;

                    $bank = new Bankinfo();
                    $bank->bank_name = $request->input('bank_name');
                    $bank->branch_name = $request->input('branch_name');
                    $bank->account_name = $request->input('account_name');
                    $bank->account_number = $request->input('account_number');
                    $bank->user_id = $user_id;
                    $bank->emp_id = $emp_id;

                    $bank->save();

                    $office = new Officeinfo();
                    $office->employee_id = $request->input('employee_id');
                    $office->email = $request->input('email');
                    $office->designation_id = $request->input('designation');
                    $office->joining_date = $request->input('joining_date');
                    $office->user_id = $user_id;
                    $office->emp_id = $emp_id;
                    $office->save();

                    $contact = new Contactinfo();
                    $contact->present_address = $request->input('present_address');
                    $contact->city = $request->input('city');
                    $contact->country = $request->input('country');
                    $contact->mobile = $request->input('mobile');
                    $contact->phone = $request->input('phone');
                    $contact->user_id = $user_id;
                    $contact->emp_id = $emp_id;
                    $contact->save();

                    $document = new Documentinfo();
                    $document->appoinment = '';
                    $document->cv = '';
                    $document->nid = '';
                    $document->user_id = $user_id;
                    $document->emp_id = $emp_id;
                    $document->save();

                    $request->session()->flash('smsg', 'New employee added successfully!');
                    return redirect()->route('employee');
                } else {
                    $data['departments'] = Department::all();
                    $request->session()->flash('emsg', 'Failed to add new employee!!!');
                    return view('hrms.employee.employeeAdd', $data);
                }

            } else {
                return view('auth.login');
            }
        }
    }


    public function employee_edit(Request $request, $id) {
        if ($this->check_user() ) {
            return redirect()->route('logout');
        } else {
            if ($request->isMethod('get')) {
                $data['departments'] = Department::all();
                $data['employee'] = Employee::find($id);
                $data['office'] = Officeinfo::where('emp_id', $id)->first();
                $data['contact'] = Contactinfo::where('emp_id', $id)->first();
                $data['document'] = Documentinfo::where('emp_id', $id)->first();
                $data['bank'] = Bankinfo::where('emp_id', $id)->first();
                $data['user'] = User::where('id', $data['employee']->user_id)->first();


                return view('hrms.employee.employeeEdit', $data);

            } elseif ($request->isMethod('post')) {

                $request->validate([
                    'first_name' => 'required|string|max:255',
                    'last_name' => 'required|string|max:255',
                    'dob' => 'required|string|max:255',
                    'gender' => 'required|string|max:255',
                    'marital_status' => 'required|string|max:255',
                    'father_name' => 'required|string|max:255',
                    'nationality' => 'required|string|max:255',
                    'present_address' => 'required|string',
                    'city' => 'required|string|max:255',
                    'country' => 'required|string|max:255',
                    'mobile' => 'required|string|max:255',
                    'employee_id' => 'required|string|max:255',
                    'email' => 'required|string|max:255',
                    'designation' => 'required|string|max:255',
                ]);

                $employee = Employee::find($id);
                $bank = Bankinfo::where('emp_id', $id)->first();
                $user = User::find($employee->user_id);
                $office = Officeinfo::where('emp_id', $id)->first();
                $contact = Contactinfo::where('emp_id', $id)->first();                
                $document = Documentinfo::where('emp_id', $id)->first();

                if (Input::hasFile('image')) {
                    $image = $request->file('image');
                    $imagename = time() . '_' . $image->getClientOriginalname();
                    $thumb = 'thumb_' . $imagename;

                    $destinationPath = 'public/assets/employee';
                    $img = Image::make($image->getRealPath())->resize(150, 150);

                    $img->save($destinationPath . '/' . $thumb);
                    $image->move($destinationPath, $imagename);
                    $image = $imagename;
                    $thumb = $thumb;
                    $path = 'public/assets/employee/';
                } else {
                    $image = $user->image;
                    $thumb = $user->thumb;
                    $path = $user->image_path;
                }


                $user->name = $request->input('first_name') . ' ' . $request->input('last_name');
                $user->email = $request->input('email');
                $user->status = $request->input('status');
                $user->image = $image;
                $user->thumb = $thumb;
                $user->image_path = $path;

                $employee->first_name = $request->input('first_name');
                $employee->last_name = $request->input('last_name');
                $employee->dob = $request->input('dob');
                $employee->gender = $request->input('gender');
                $employee->marital_status = $request->input('marital_status');
                $employee->father_name = $request->input('father_name');
                $employee->nationality = $request->input('nationality');
                $employee->nid = $request->input('nid');
                $employee->photo = $image;
                $employee->photo_path = $path;

                $bank->bank_name = $request->input('bank_name');
                $bank->branch_name = $request->input('branch_name');
                $bank->account_name = $request->input('account_name');
                $bank->account_number = $request->input('account_number');

                $office->employee_id = $request->input('employee_id');
                $office->email = $request->input('email');
                $office->designation_id = $request->input('designation');
                $office->joining_date = $request->input('joining_date');

                $contact->present_address = $request->input('present_address');
                $contact->city = $request->input('city');
                $contact->country = $request->input('country');
                $contact->mobile = $request->input('mobile');
                $contact->phone = $request->input('phone');

                $document->appoinment = '';
                $document->cv = '';
                $document->nid = '';

                if ($user->update() && $employee->update() && $contact->update() && $office->update() && $document->update() && $bank->update()) {
                    
                    $request->session()->flash('smsg', 'Employee info edited successfully!');
                    return redirect()->route('employee');   
                }else{
                    $request->session()->flash('emsg', 'Failed to update employee info!');
                    return redirect()->route('employee_edit', ['id'=>$id]);
                }

            } else {
                return view('auth.login');
            }
        }
    }

}
