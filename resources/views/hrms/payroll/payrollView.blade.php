@extends('layouts.master')
@section('content-header')
    <h1>Payroll Details <span class="pull-right"><a href="{{ route('payroll_edit', ['id' => $payroll->id ]) }}"><img class="header-edit-img" src="{{ asset('public/admin_images/edit-icon.png') }}"></a></span></h1>
@endsection
@section('content')
    <div class="col-sm-12">
        @if ($errors->any())
            <div class="col-sm-offset-3 col-sm-6 alert-message">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
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
            <div class="col-sm-6 col-sm-offset-3">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">Employee Information</h4>
                    </div>
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive"
                             src="{{ asset($payroll->employee->photo_path.$payroll->employee->photo) }}"
                             alt="User profile picture">

                        <h3 class="profile-username text-center">{{ $payroll->employee->first_name.' '.$payroll->employee->last_name }}</h3>

                        <p class="text-muted text-center">{{ $payroll->employee->officeinfo->designation->department->name }}
                            - {{ $payroll->employee->officeinfo->designation->name }}</p>

                        <p class="text-muted text-center">Employment Type -
                            @if($payroll->employment_type === 1)
                                {{ 'Permanent' }}
                            @elseif($payroll->employment_type === 2)
                                {{ 'Provision' }}
                            @else
                                {{ 'Intern' }}
                            @endif
                        </p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Basic Salary</b> <a class="pull-right"
                                                       id="a_basic_salary">{!! Session::get('settings')['currency'] !!} {{ $payroll->basic_salary }}</a>
                            </li>

                            <li class="list-group-item">
                                <b>Total Allowance </b> <a class="pull-right" id="a_total_allowance">
                                    {!! Session::get('settings')['currency'] !!} {{  $total_allowance = $payroll->house_rent_allowance + $payroll->medical_allowance + $payroll->special_allowance + $payroll->fuel_allowance + $payroll->phone_bill_allowance + $payroll->other_allowance }}
                                </a>
                            </li>

                            <li class="list-group-item">
                                <b>Total Deduction </b> <a class="pull-right" id="a_total_deduction">
                                    {!! Session::get('settings')['currency'] !!} {{ $total_deduction =$payroll->tax_deduction + $payroll->provident_fund + $payroll->other_deduction }}
                                </a>
                            </li>

                            <li class="list-group-item">
                                <b> Net. Salary</b> <a class="pull-right"
                                                        id="a_total">{!! Session::get('settings')['currency'] !!} {{ $payroll->basic_salary + $total_allowance - $total_deduction }}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>

            <div class="col-sm-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">Allowance Information</h4>
                    </div>
                    <div class="box-body">

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b> House Rent Allowance</b> <a
                                        class="pull-right">{!! Session::get('settings')['currency'] !!} {{ $payroll->house_rent_allowance }}</a>
                            </li>
                            <li class="list-group-item">
                                <b> Medical Allowance</b> <a class="pull-right">{!! Session::get('settings')['currency'] !!} {{ $payroll->medical_allowance }}</a>
                            </li>
                            <li class="list-group-item">
                                <b> Special Allowance</b> <a class="pull-right">{!! Session::get('settings')['currency'] !!} {{ $payroll->special_allowance }}</a>
                            </li>
                            <li class="list-group-item">
                                <b> Fuel Allowance</b> <a class="pull-right">{!! Session::get('settings')['currency'] !!} {{ $payroll->fuel_allowance }}</a>
                            </li>
                            <li class="list-group-item">
                                <b> Phone Bill Allowance</b> <a
                                        class="pull-right">{!! Session::get('settings')['currency'] !!} {{ $payroll->phone_bill_allowance }}</a>
                            </li>
                            <li class="list-group-item">
                                <b> Other Allowance</b> <a class="pull-right">{!! Session::get('settings')['currency'] !!} {{ $payroll->other_allowance }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-sm-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">Deduction Information</h4>
                    </div>
                    <div class="box-body">

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b> Tax Deduction</b> <a class="pull-right">{!! Session::get('settings')['currency'] !!} {{ $payroll->tax_deduction }}</a>
                            </li>
                            <li class="list-group-item">
                                <b> Provident Fund</b> <a class="pull-right">{!! Session::get('settings')['currency'] !!} {{ $payroll->provident_fund }}</a>
                            </li>
                            <li class="list-group-item">
                                <b> Other Deduction</b> <a class="pull-right">{!! Session::get('settings')['currency'] !!} {{ $payroll->other_deduction }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
@endsection