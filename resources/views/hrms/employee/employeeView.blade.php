@extends('layouts.master')
@section('content-header')
    <h1>
        Employee Info <span class="pull-right"><a href="{{ route('employee_edit', ['id' => $employee->id ]) }}">Edit this Info</a></span>
    </h1>
@endsection
@section('content')
<section class="content">
    <div class="row">

        <div class="col-sm-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">Personal Details</h4>
                </div>
                <div class="box-body box-profile">
                    @if($employee->photo)
                    <img class="profile-user-img img-responsive" src="{{ asset($employee->photo_path.$employee->photo) }}" alt="User profile picture">
                    @else
                        <img class="profile-user-img img-responsive" src="{{ asset('public/assets/employee/no_images.png') }}" alt="User profile picture">
                    @endif

                    <h3 class="profile-username text-center">{{ $employee->first_name.' '.$employee->last_name }}</h3>

                    <p class="text-muted text-center">{{ $employee->officeinfo->designation->department->name }} - {{ $employee->officeinfo->designation->name }}</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Date of Birth</b> <a class="pull-right">{{ date('d, M, Y', strtotime($employee->dob)) }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>Marital Status </b> <a class="pull-right">{{ $employee->marital_status }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>Father's name * </b> <a class="pull-right">{{ $employee->father_name }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>Nationality </b> <a class="pull-right">{{ $employee->nationality }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>NID no. </b> <a class="pull-right">{{ $employee->nid }}</a>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>


        <div class="col-sm-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">Official Info</h4>
                </div>
                <div class="box-body box-profile">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Employee ID </b> <a class="pull-right">{{ $office->employee_id }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>Email </b> <a class="pull-right">{{ $office->email }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>Joining Date </b> <a class="pull-right">{{ $office->joining_date }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>Active Status</b> <a class="pull-right">{{ $employee->status === 1 ? "Yes" : "No" }}</a>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

        <div class="col-sm-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">Documents Info</h4>
                </div>
                <div class="box-body box-profile">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Appointment Letter </b>
                            @if($document->appointment)
                            <a href="{{ asset('public/asstes/documents/'. $document->appointment) }}" download class="pull-right">Download</a>
                            @endif
                        </li>

                        <li class="list-group-item">
                            <b>CV </b>
                            @if($document->cv)
                            <a href="{{ asset('public/asstes/documents/'. $document->cv) }}" download class="pull-right">Download</a>
                            @endif
                        </li>

                        <li class="list-group-item">
                            <b>NID </b>
                            @if($document->nid)
                            <a href="{{ asset('public/asstes/documents/'. $document->nid) }}" download class="pull-right">Download</a>
                            @endif
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>


        <div class="col-sm-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">Contact Details</h4>
                </div>
                <div class="box-body box-profile">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Present Address </b> <a class="pull-right">{{ $contact->present_address }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>City </b> <a class="pull-right">{{ $contact->city }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>Country </b> <a class="pull-right">{{ $contact->country }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>Mobile </b> <a class="pull-right">{{ $contact->mobile }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>Phone </b> <a class="pull-right">{{ $contact->phone }}</a>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

        <div class="col-sm-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">Bank Info</h4>
                </div>
                <div class="box-body box-profile">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Bank Name </b> <a class="pull-right">{{ $bank->bank_name }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>Branch Name </b> <a class="pull-right">{{ $bank->branch_name }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>Account Name </b> <a class="pull-right">{{ $bank->account_name }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>Account Number </b> <a class="pull-right">{{ $bank->account_number }}</a>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

    </div>
</section>

@endsection

@section('scripts')
@endsection