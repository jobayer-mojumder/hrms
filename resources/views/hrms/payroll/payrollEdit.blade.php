@extends('layouts.master')
@section('content-header')
    <h1>Edit Payroll info</h1>
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
            <form method="post" action="{{ route('payroll_edit', ['id' => $payroll->id ]) }}">
                {{ csrf_field() }}

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
                            <div class="form-group" style="margin-top: 15px;">
                                <label for="employment_type" class="col-sm-4 control-label">Employment Type</label>

                                <div class="col-sm-8">
                                    <select class="form-control" name="employment_type" id="employment_type"
                                            required="required">
                                        <option value="">Select</option>
                                        <option value="1" {{ $payroll->employment_type === 1 ? 'selected':'' }}>Permanent</option>
                                        <option value="2" {{ $payroll->employment_type === 2 ? 'selected':'' }}>Provision</option>
                                        <option value="3" {{ $payroll->employment_type === 3 ? 'selected':'' }}>Intern</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">Salary Information</h4>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="basic_salary">Basic Salary</label>
                                <input value="{{ $payroll->basic_salary }}" type="number" class="form-control" name="basic_salary"
                                       id="basic_salary" step=".01">
                            </div>
                            <div class="form-group">
                                <label for="house_rent_allowance">House Rent Allowance</label>
                                <input value="{{ $payroll->house_rent_allowance }}" type="number" class="form-control" name="house_rent_allowance"
                                       id="house_rent_allowance" step=".01">
                            </div>
                            <div class="form-group">
                                <label for="medical_allowance">Medical Allowance</label>
                                <input value="{{ $payroll->medical_allowance }}" type="number" class="form-control" name="medical_allowance"
                                       id="medical_allowance" step=".01">
                            </div>
                            <div class="form-group">
                                <label for="special_allowance">Special Allowance</label>
                                <input value="{{ $payroll->special_allowance }}" type="number" class="form-control" id="special_allowance"
                                       name="special_allowance" step=".01">
                            </div>
                            <div class="form-group">
                                <label for="fuel_allowance">Fuel Allowance</label>
                                <input value="{{ $payroll->fuel_allowance }}" type="number" class="form-control" id="fuel_allowance"
                                       name="fuel_allowance" step=".01">
                            </div>
                            <div class="form-group">
                                <label for="phone_bill_allowance">Phone Bill Allowance</label>
                                <input value="{{ $payroll->phone_bill_allowance }}" type="number" class="form-control" id="phone_bill_allowance"
                                       name="phone_bill_allowance" step=".01">
                            </div>
                            <div class="form-group">
                                <label for="other_allowance">Other Allowance</label>
                                <input value="{{ $payroll->other_allowance }}" type="number" class="form-control" id="other_allowance"
                                       name="other_allowance" step=".01">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-4">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">Deduction Information</h4>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="tax_deduction">Tax Deduction</label>
                                <input value="{{ $payroll->tax_deduction }}" type="number" class="form-control" name="tax_deduction"
                                       id="tax_deduction" step=".01">
                            </div>
                            <div class="form-group">
                                <label for="provident_fund">Provident Fund</label>
                                <input value="{{ $payroll->provident_fund }}" type="number" class="form-control" name="provident_fund"
                                       id="provident_fund" step=".01">
                            </div>
                            <div class="form-group">
                                <label for="other_deduction">Other Deduction</label>
                                <input value="{{ $payroll->other_deduction }}" type="number" class="form-control" name="other_deduction"
                                       id="other_deduction" step=".01">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">Final salary</h4>
                        </div>
                        <div class="box-body">

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Basic Salary</b> <a class="pull-right" id="a_basic_salary">0</a>
                                </li>

                                <li class="list-group-item">
                                    <b>Total Allowance </b> <a class="pull-right" id="a_total_allowance">0</a>
                                </li>

                                <li class="list-group-item">
                                    <b>Total Deduction </b> <a class="pull-right" id="a_total_deduction">0</a>
                                </li>

                                <li class="list-group-item">
                                    <b>Total </b> <a class="pull-right" id="a_total">0</a>
                                </li>
                            </ul>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right">Save</button>
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
        $(document).ready(function () {

            salaryCalcualtion();

            $('input[type=number]').on('change', function () {
                if (this.value == '' || parseFloat(this.value) < 0) {
                    this.value = 0;
                }
                salaryCalcualtion();
            });

            function salaryCalcualtion () {
                let basic_salary = parseFloat($('#basic_salary').val());
                let house_rent_allowance = parseFloat($('#house_rent_allowance').val());
                let medical_allowance = parseFloat($('#medical_allowance').val());
                let special_allowance = parseFloat($('#special_allowance').val());
                let fuel_allowance = parseFloat($('#fuel_allowance').val());
                let phone_bill_allowance = parseFloat($('#phone_bill_allowance').val());
                let other_allowance = parseFloat($('#other_allowance').val());
                let tax_deduction = parseFloat($('#tax_deduction').val());
                let provident_fund = parseFloat($('#provident_fund').val());
                let other_deduction = parseFloat($('#other_deduction').val());

                let total_allowance = house_rent_allowance + medical_allowance + special_allowance + fuel_allowance + phone_bill_allowance + other_allowance;
                let total_deduction = tax_deduction + provident_fund + other_deduction;

                $('#a_basic_salary').text(basic_salary);
                $('#a_total_allowance').text(total_allowance);
                $('#a_total_deduction').text(total_deduction);
                $('#a_total').text(total_allowance + basic_salary - total_deduction);

            }
        });
    </script>
@endsection