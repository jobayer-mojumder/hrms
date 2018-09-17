@extends('layouts.master')
@section('content-header')
    <h1>Edit Payment Info</h1>
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
            <form method="post" action="{{ route('payment_edit', ['id'=>$payment->id]) }}">
                {{ csrf_field() }}
                <div class="col-sm-12">
                    <div class="col-sm-5">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h4 class="box-title">Employee Info</h4>
                            </div>

                            <div class="box-body form-horizontal">

                                <img class="profile-user-img img-responsive"
                                     src="{{ asset($payment->employee->photo_path.$payment->employee->photo) }}"
                                     alt="User profile picture">

                                <h3 class="profile-username text-center">{{ $payment->employee->first_name.' '.$payment->employee->last_name }}</h3>

                                <p class="text-muted text-center">{{ $payment->employee->officeinfo->designation->department->name }}
                                    - {{ $payment->employee->officeinfo->designation->name }}</p>

                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-5 control-label">Payment for Month</label>
                                    <div class="col-sm-7">
                                        <div class="input-group input-append date" id="date" style="width:200px;">
                                            <input type="text" class="form-control" name="payment_date" id="date"
                                                   readonly="readonly" value="{{ $payment->payment_for_month }}"
                                                   required/>
                                            <span class="input-group-addon add-on"><span
                                                        class="glyphicon glyphicon-calendar" id="date"></span></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h4 class="box-title">Salary Information</h4>
                            </div>
                            <div class="box-body form-horizontal">
                                <div class="form-group">
                                    <label for="gross_salary" class="col-sm-4 control-label">Gross Salary</label>
                                    <div class="col-sm-8">
                                        <input value="{{ $payment->gross_salary }}" type="number" class="form-control"
                                               name="gross_salary"
                                               id="gross_salary"
                                               step=".01" readonly="readonly">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="total_deduction" class="col-sm-4 control-label">Total Deduction</label>
                                    <div class="col-sm-8">
                                        <input value="{{ $payment->total_deduction }}" type="number"
                                               class="form-control" name="total_deduction"
                                               id="total_deduction"
                                               step=".01" readonly="readonly">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="net_salary" class="col-sm-4 control-label">Net Salary</label>
                                    <div class="col-sm-8">
                                        <input value="{{ $payment->net_salary }}" type="number" class="form-control"
                                               name="net_salary"
                                               id="net_salary"
                                               step=".01" readonly="readonly">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="bonus" class="col-sm-4 control-label">Bonus</label>
                                    <div class="col-sm-8">
                                        <input value="{{ $payment->bonus }}" type="number" class="form-control"
                                               name="bonus"
                                               id="bonus"
                                               step=".01">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="fine_deduction" class="col-sm-4 control-label">Fine Deduction</label>
                                    <div class="col-sm-8">
                                        <input value="{{ $payment->fine_deduction }}" type="number" class="form-control"
                                               name="fine_deduction"
                                               id="fine_deduction"
                                               step=".01">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="payment_amount" class="col-sm-4 control-label">Payment Amount</label>
                                    <div class="col-sm-8">
                                        <input value="{{ $payment->payment_amount }}" type="number" class="form-control"
                                               name="payment_amount"
                                               id="payment_amount"
                                               step=".01" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="payment_type" class="col-sm-4 control-label">Payment Type</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="payment_type"
                                                id="payment_type" required>
                                            <option value="">select</option>
                                            @foreach($payment_types as $row)
                                                <option {{ $payment->payment_type === $row->id ? 'selected':'' }} value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="comments" class="col-sm-4 control-label">Comments</label>
                                    <div class="col-sm-8">
                                        <textarea name="comments" id="comments"
                                                  class="form-control">{{ $payment->comments }}</textarea>
                                    </div>
                                </div>

                            </div>
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

            $('input[type=number]').on('change', function () {
                if (this.value == '' || parseFloat(this.value) < 0) {
                    this.value = 0;
                }
            });

            $('#fine_deduction').on('change', function () {
                salaryCalculation();
            });

            $('#bonus').on('change', function () {
                salaryCalculation();
            });

            function salaryCalculation() {
                let net = parseFloat($('#net_salary').val());
                let bonus = parseFloat($('#bonus').val());
                let fine = parseFloat($('#fine_deduction').val());

                $('#payment_amount').val((net + bonus) - fine);
            }

        });
    </script>

    <script>
        $(document).ready(function () {

            $('#date')
                .datepicker({
                    format: "yyyy-mm",
                    startView: "months",
                    minViewMode: "months",
                    autoclose: true,
                    clearBtn: true,
                    showClose: true,
                })

        });
    </script>
@endsection