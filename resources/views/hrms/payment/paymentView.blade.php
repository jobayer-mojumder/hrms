@extends('layouts.master')
@section('content-header')
    <h1>Payment Details <span class="pull-right"><a href="{{ route('payment_edit', ['id' => $payment->id ]) }}">Edit this</a></span></h1>
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
            <div class="col-sm-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">Employee Information</h4>
                    </div>
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive"
                             src="{{ asset($payment->employee->photo_path.$payment->employee->photo) }}"
                             alt="User profile picture">

                        <h3 class="profile-username text-center">{{ $payment->employee->first_name.' '.$payment->employee->last_name }}</h3>

                        <p class="text-muted text-center">{{ $payment->employee->officeinfo->designation->department->name }}
                            - {{ $payment->employee->officeinfo->designation->name }}</p>

                        <p class="text-muted text-center">Employment Type -
                            @if($payment->employment_type === 1)
                                {{ 'Permanent' }}
                            @elseif($payment->employment_type === 2)
                                {{ 'Provision' }}
                            @else
                                {{ 'Intern' }}
                            @endif
                        </p>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>

            <div class="col-sm-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">Employee Information</h4>
                    </div>
                    <div class="box-body box-profile">

                        <ul class="list-group list-group-unbordered">

                            <li class="list-group-item">
                                <b>Salary Month</b> <a class="pull-right" >{{ date('F-Y', strtotime($payment->payment_for_month)) }}</a>
                            </li>

                            <li class="list-group-item">
                                <b>Net Salary</b> <a class="pull-right" >{{ $payment->net_salary }}</a>
                            </li>

                            @if( $payment->bonus >0 )
                                <li class="list-group-item">
                                    <b>Bonus </b> <a class="pull-right"> {{ $payment->bonus }} </a>
                                </li>
                            @endif

                            @if( $payment->fine_deduction >0 )
                                <li class="list-group-item">
                                    <b>Fine Deduction </b> <a class="pull-right"> {{ $payment->fine_deduction }} </a>
                                </li>
                            @endif

                            <li class="list-group-item">
                                <b>Total Payable </b> <a class="pull-right"> {{ $payment->total_payable }} </a>
                            </li>

                            <li class="list-group-item">
                                <b> Payment Amount</b> <a class="pull-right" >{{ $payment->payment_amount }}</a>
                            </li>
                            <li class="list-group-item">
                                <b> Payment Due</b> <a class="pull-right" >{{ $payment->payment_due}}</a>
                            </li>

                            <li class="list-group-item">
                                <b> Payment Type</b> <a class="pull-right" >{{ $payment->paymentType->name }}</a>
                            </li>

                            @if( $payment->comments )
                                <li class="list-group-item">
                                    <b>Comments </b> <a class="pull-right"> {{ $payment->comments }} </a>
                                </li>
                            @endif

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
                                        class="pull-right">{{ $payment->house_rent_allowance }}</a>
                            </li>
                            <li class="list-group-item">
                                <b> Medical Allowance</b> <a class="pull-right">{{ $payment->medical_allowance }}</a>
                            </li>
                            <li class="list-group-item">
                                <b> Special Allowance</b> <a class="pull-right">{{ $payment->special_allowance }}</a>
                            </li>
                            <li class="list-group-item">
                                <b> Fuel Allowance</b> <a class="pull-right">{{ $payment->fuel_allowance }}</a>
                            </li>
                            <li class="list-group-item">
                                <b> Phone Bill Allowance</b> <a
                                        class="pull-right">{{ $payment->phone_bill_allowance }}</a>
                            </li>
                            <li class="list-group-item">
                                <b> Other Allowance</b> <a class="pull-right">{{ $payment->other_allowance }}</a>
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
                                <b> Tax Deduction</b> <a class="pull-right">{{ $payment->tax_deduction }}</a>
                            </li>
                            <li class="list-group-item">
                                <b> Provident Fund</b> <a class="pull-right">{{ $payment->provident_fund }}</a>
                            </li>
                            <li class="list-group-item">
                                <b> Other Deduction</b> <a class="pull-right">{{ $payment->other_deduction }}</a>
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