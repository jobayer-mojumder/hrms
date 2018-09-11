@extends('layouts.master')
@section('content-header')
    <h1>New Employee</h1>
@endsection
@section('content')
    <div class="col-sm-12">
        @if ($errors->any())
            <div class="col-sm-offset-3 col-sm-6 alert-message">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                    </button>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            </div><br>
        @endif
        @if(Session::has('smsg'))
            <div class="col-sm-offset-3 col-sm-6 alert-message">
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <p><i class="icon fa fa-check"></i> {!! session('smsg') !!}</p>
                </div>
            </div><br>
        @endif

        @if(Session::has('emsg'))
            <div class="col-sm-offset-3 col-sm-6 alert-message">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <p><i class="icon fa fa-ban"></i> {!! session('emsg') !!}</p>
                </div>
            </div>
        @endif

    </div>
    <section class="content">
        <div class="row">
            <form class="form-horizontal" method="post" action="{{ route('employee_add') }}"
                  enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-sm-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">Personal Details</h4>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="first_name">Firstname <span class="text-red">*</span></label>
                                <input value="{{ old('first_name') }}" type="text" class="form-control" id="first_name"
                                       placeholder="Enter firstname" name="first_name" required="required">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Lastname <span class="text-red">*</span></label>
                                <input value="{{ old('last_name') }}" type="text" class="form-control" id="last_name"
                                       placeholder="Enter lastname" name="last_name" required="required">
                            </div>

                            <div class="form-group">
                                <label for="dob">Date of Birth <span class="text-red">*</span></label>
                                <input value="{{ old('dob') }}" type="text" name="dob" class="form-control date"
                                       id="dob" readonly="readonly" required="required">
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender <span class="text-red">*</span></label>
                                <select class="form-control" name="gender" id="gender" required="required">
                                    <option value="">Select Gender</option>
                                    <option @if(old('gender') == 'Male') {{ 'selected' }}  @endif >Male</option>
                                    <option @if(old('gender') == 'Female') {{ 'selected' }}  @endif >Female</option>
                                    <option @if(old('gender') == 'Other') {{ 'selected' }}  @endif >Other</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="marital_status">Marital Status <span class="text-red">*</span></label>
                                <select class="form-control" name="marital_status" id="marital_status"
                                        required="required">
                                    <option value="">Select</option>
                                    <option @if(old('marital_status') == 'Married') {{ 'selected' }}  @endif >Married
                                    </option>
                                    <option @if(old('marital_status') == 'Un-Married') {{ 'selected' }}  @endif >
                                        Un-Married
                                    </option>
                                    <option @if(old('marital_status') == 'Widowed') {{ 'selected' }}  @endif >Widowed
                                    </option>
                                    <option @if(old('marital_status') == 'Divorced') {{ 'selected' }}  @endif >
                                        Divorced
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="father_name">Father's name <span class="text-red">*</span></label>
                                <input value="{{ old('father_name') }}" type="text" name="father_name"
                                       class="form-control" id="father_name" required="required">
                            </div>

                            <div class="form-group">
                                <label for="nationality">Nationality <span class="text-red">*</span></label>
                                <input value="{{ old('nationality') }}" type="text" name="nationality"
                                       class="form-control" id="nationality" required="required">
                            </div>

                            <div class="form-group">
                                <label for="nid">NID</label>
                                <input value="{{ old('nid') }}" type="number" name="nid" class="form-control" id="nid">
                            </div>

                            <div class="form-group">
                                <label for="image">Photo</label>
                                <input value="" class="form-control" type="file" id="image" name="image">
                                <div class="image-emp">
                                    <img src="{{ asset('public/assets/employee/no_images.png') }}" height="84px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">Contact Details</h4>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="present_address">Present Address <span class="text-red">*</span></label>
                                <textarea class="form-control" id="present_address" name="present_address"
                                          required="required"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="city">City <span class="text-red">*</span></label>
                                <input value="{{ old('city') }}" type="text" class="form-control" name="city" id="city"
                                       placeholder="Enter city" required="required">
                            </div>
                            <div class="form-group">
                                <label for="country">Country <span class="text-red">*</span></label>
                                <input value="{{ old('country') }}" type="text" placeholder="Enter country name"
                                       name="country" id="country" class="form-control" required="required">
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile <span class="text-red">*</span></label>
                                <input value="{{ old('mobile') }}" type="text" placeholder="Enter mobile number"
                                       name="mobile" id="mobile" class="form-control" required="required">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input value="{{ old('phone') }}" type="text" placeholder="Enter phone" name="phone"
                                       id="phone" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">Official Info</h4>
                        </div>
                        <div class="box-body">

                            <div class="form-group">
                                <label for="employee_id">Employee ID <span class="text-red">*</span></label>
                                <input value="{{ old('employee_id') }}" type="text" class="form-control"
                                       name="employee_id" id="employee_id" placeholder="Enter employee ID"
                                       required="required">
                            </div>
                            <div class="form-group">
                                <label for="email">Email <span class="text-red">*</span></label>
                                <input value="{{ old('email') }}" type="email" class="form-control" name="email"
                                       id="email" placeholder="Enter email" required="required">
                            </div>
                            <div class="form-group">
                                <label for="designation">Designation <span class="text-red">*</span></label>
                                <select class="form-control" name="designation" id="designation" required="required">
                                    <option value="">Select</option>
                                    @foreach($departments as $department)
                                        <optgroup label="{{ $department->name }}">
                                            @foreach($department->designation as $designation)
                                                <option @if(old('designation_id') == $designation->id) {{ 'selected' }}  @endif value="{{ $designation->id }}">{{ $designation->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="joining_date">Joining Date</label>
                                <input value="{{ old('joining_date') }}" type="text" id="joining_date"
                                       name="joining_date" class="form-control date" readonly="readonly">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">Bank Information</h4>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="bank_name">Bank Name</label>
                                <input value="{{ old('bank_name') }}" type="text" class="form-control" name="bank_name"
                                       id="bank_name" placeholder="Enter Bank name">
                            </div>
                            <div class="form-group">
                                <label for="branch_name">Branch Name</label>
                                <input value="{{ old('branch_name') }}" type="text" class="form-control"
                                       name="branch_name" id="branch_name" placeholder="Enter Branch name">
                            </div>
                            <div class="form-group">
                                <label for="account_name">Account Name</label>
                                <input value="{{ old('account_name') }}" type="text" class="form-control"
                                       name="account_name" id="account_name" placeholder="Enter Account name">
                            </div>
                            <div class="form-group">
                                <label for="account_number">Account Number</label>
                                <input value="{{ old('account_number') }}" type="text" class="form-control"
                                       id="account_number" name="account_number" placeholder="Enter Account number">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">Documents</h4>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="appointment_file">Appointment letter</label>
                                <input value="" class="form-control" type="file" name="appointment_file">
                            </div>
                            <div class="form-group">
                                <label for="cv_file">CV</label>
                                <input value="" class="form-control" type="file" name="cv_file">
                            </div>
                            <div class="form-group">
                                <label for="nid_file">NID</label>
                                <input value="" class="form-control" type="file" name="nid_file">
                            </div>
                            <div class="form-group" align="middle">
                                <br>
                                <button class="btn btn-info" type="submit">Save All info</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection

@section('scripts')

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    //alert(e.target.result);
                    $('#imgLogo').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection