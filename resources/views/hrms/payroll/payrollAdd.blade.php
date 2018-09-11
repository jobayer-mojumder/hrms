@extends('layouts.master')

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
            <form method="post" action="{{ route('payroll_add') }}" >
                {{ csrf_field() }}
                <div class="col-sm-12">
                    <div class="col-sm-6 col-md-offset-3">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h4 class="box-title">Employee Info</h4>
                            </div>

                            <div class="box-body form-horizontal">
                                <div class="form-group">
                                    <label for="designation" class="col-sm-4 control-label">Designation</label>

                                    <div class="col-sm-8">
                                        <select class="form-control" name="designation" id="designation"
                                                required="required">
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
                                </div>
                                <div class="form-group">
                                    <label for="employee" class="col-sm-4 control-label">Employee</label>

                                    <div class="col-sm-8">
                                        <select class="form-control" name="employee" id="employee"
                                                required="required">

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="employment_type" class="col-sm-4 control-label">Employment Type</label>

                                    <div class="col-sm-8">
                                        <select class="form-control" name="employment_type" id="employment_type"
                                                required="required">
                                            <option value="">Select</option>
                                            <option value="1">Permanent</option>
                                            <option value="2">Provision</option>
                                            <option value="3">Intern</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 salary-hide">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">Salary Information</h4>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="basic_salary">Basic Salary</label>
                                <input value="" type="number" class="form-control" name="basic_salary" id="basic_salary" >
                            </div>
                            <div class="form-group">
                                <label for="house_rent_allowance">House Rent Allowance</label>
                                <input value="" type="number" class="form-control" name="house_rent_allowance" id="house_rent_allowance">
                            </div>
                            <div class="form-group">
                                <label for="medical_allowance">Medical Allowance</label>
                                <input value="" type="number" class="form-control" name="medical_allowance" id="medical_allowance" >
                            </div>
                            <div class="form-group">
                                <label for="special_allowance">Special Allowance</label>
                                <input value="" type="number" class="form-control" id="special_allowance" name="special_allowance" >
                            </div>
                            <div class="form-group">
                                <label for="fuel_allowance">Fuel Allowance</label>
                                <input value="" type="number" class="form-control" id="fuel_allowance" name="fuel_allowance" >
                            </div>
                            <div class="form-group">
                                <label for="phone_bill_allowance">Phone Bill Allowance</label>
                                <input value="" type="number" class="form-control" id="phone_bill_allowance" name="phone_bill_allowance" >
                            </div>
                            <div class="form-group">
                                <label for="other_allowance">Other Allowance</label>
                                <input value="" type="number" class="form-control" id="other_allowance" name="other_allowance" >
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-4 salary-hide">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">Deduction Information</h4>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="tax_deduction">Tax Deduction</label>
                                <input value="" type="number" class="form-control" name="tax_deduction" id="tax_deduction" >
                            </div>
                            <div class="form-group">
                                <label for="provident_fund">Provident Fund</label>
                                <input value="" type="number" class="form-control" name="provident_fund" id="provident_fund">
                            </div>
                            <div class="form-group">
                                <label for="other_deduction">Other Deduction</label>
                                <input value="" type="number" class="form-control" name="other_deduction" id="other_deduction" >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 salary-hide">
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
            $('.salary-hide').hide();
            $('input[type=number]').val(0);

            $('input[type=number]').on('change', function () {
                if (this.value == ''){
                    this.value = 0;
                }
                salaryCalcualtion();
            });

            $('#designation').on('change', function () {
                let designation_id = this.value;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: "{{ route('employeeByDesignation') }}",
                    data: {designation_id: designation_id},
                    success: function (msg) {
                        $('#employee').html(msg);
                    }
                });
            });

            $('#employee').on('change', function () {
                showHide();
            });

            function showHide(){
                let employee = $('#employee').val();
                if (employee){
                    $('.salary-hide').show();
                }else{
                    $('input[type=number]').val(0);
                    $('.salary-hide').hide();
                }
            }

            function salaryCalcualtion(){
                let basic_salary =  parseFloat($('#basic_salary').val());
                let house_rent_allowance =  parseFloat($('#house_rent_allowance').val());
                let medical_allowance =  parseFloat($('#medical_allowance').val());
                let special_allowance =  parseFloat($('#special_allowance').val());
                let fuel_allowance =  parseFloat($('#fuel_allowance').val());
                let phone_bill_allowance =  parseFloat($('#phone_bill_allowance').val());
                let other_allowance =  parseFloat($('#other_allowance').val());
                let tax_deduction =  parseFloat($('#tax_deduction').val());
                let provident_fund =  parseFloat($('#provident_fund').val());
                let other_deduction =  parseFloat($('#other_deduction').val());

                let total_allowance = house_rent_allowance + medical_allowance + special_allowance + fuel_allowance + phone_bill_allowance + other_allowance;
                let total_deduction = tax_deduction + provident_fund + other_deduction;

                $('#a_basic_salary').text(basic_salary);
                $('#a_total_allowance').text(total_allowance);
                $('#a_total_deduction').text(total_deduction);
                $('#a_total').text(total_allowance+basic_salary-total_deduction);

            }
        });
    </script>
@endsection