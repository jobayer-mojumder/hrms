@extends('layouts.master')
@section('content-header')
    <h1>Make Payment</h1>
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
            <form method="post" action="{{ route('payroll_add') }}">
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 salary-hide">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h4 class="box-title">Salary Information</h4>
                            </div>
                            <div class="box-body form-horizontal">
                                <div class="form-group">
                                    <label for="gross_salary" class="col-sm-4 control-label">Gross Salary</label>
                                    <div class="col-sm-8">
                                        <input value="" type="number" class="form-control" name="gross_salary"
                                               id="gross_salary"
                                               step=".01" readonly="readonly">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="total_deduction" class="col-sm-4 control-label">Total Deduction</label>
                                    <div class="col-sm-8">
                                        <input value="" type="number" class="form-control" name="total_deduction"
                                               id="total_deduction"
                                               step=".01" readonly="readonly">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="net_salary" class="col-sm-4 control-label">Net Salary</label>
                                    <div class="col-sm-8">
                                        <input value="" type="number" class="form-control" name="net_salary"
                                               id="net_salary"
                                               step=".01" readonly="readonly">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="bonus" class="col-sm-4 control-label">Bonus</label>
                                    <div class="col-sm-8">
                                        <input value="" type="number" class="form-control" name="bonus"
                                               id="bonus"
                                               step=".01" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="fine_deduction" class="col-sm-4 control-label">Fine Deduction</label>
                                    <div class="col-sm-8">
                                        <input value="" type="number" class="form-control" name="fine_deduction"
                                               id="fine_deduction"
                                               step=".01" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="payment_amount" class="col-sm-4 control-label">Payment Amount</label>
                                    <div class="col-sm-8">
                                        <input value="" type="number" class="form-control" name="payment_amount"
                                               id="payment_amount"
                                               step=".01" >
                                    </div>
                                </div>

                            </div>
                            <div class="box-footer">
                                <button type="button" class="btn btn-info pull-right">Save</button>
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
            var obj;

            $('.salary-hide').hide();
            $('input[type=number]').val(0);

            $('input[type=number]').on('change', function () {
                if (this.value == '' || parseFloat(this.value) < 0) {
                    this.value = 0;
                }
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

            function showHide() {
                let employee = $('#employee').val();
                if (employee) {
                    $('.salary-hide').show();
                    getSalaryInfo(employee)
                } else {
                    $('input[type=number]').val(0);
                    $('.salary-hide').hide();
                }
            }

            function getSalaryInfo(emp_id) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: "{{ route('employeeSalaryInfo') }}",
                    data: {emp_id: emp_id},
                    success: function (data) {
                        if (data) {
                            obj = JSON.parse(data);
                            parseSalaryData(obj);
                        }else{
                            alert("Payroll not found for this employee. Please create a payroll for this employee before payment.");
                        }
                    }
                });
            }

            function parseSalaryData(data){
                $('#gross_salary').val(data['gross_salary']);
                $('#total_deduction').val(data['total_deduction']);
                $('#net_salary').val(data['net_salary']);
                $('#fine_deduction').val(0);
                $('#payment_amount').val(data['net_salary']);

            }

            $('#fine_deduction').on('change', function () {
                salaryCalculation();
            });

            $('#bonus').on('change', function () {
                salaryCalculation();
            });

            function salaryCalculation(){
                let net = parseFloat($('#net_salary').val());
                let bonus = parseFloat($('#bonus').val());
                let fine = parseFloat($('#fine_deduction').val());

                $('#payment_amount').val((net+bonus)-fine);
            }

        });
    </script>
@endsection