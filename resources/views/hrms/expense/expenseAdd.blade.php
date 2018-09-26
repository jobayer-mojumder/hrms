@extends('layouts.master')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h4 class="box-title">New Expense</h4>
                    </div>

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
                            <div class="col-sm-offset-3 col-sm-6">
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button>
                                    <p><i class="icon fa fa-check"></i> {!! session('smsg') !!}</p>
                                </div>
                            </div><br>
                        @endif

                        @if(Session::has('emsg'))
                            <div class="col-sm-offset-3 col-sm-6">
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button>
                                    <p><i class="icon fa fa-ban"></i> {!! session('smsg') !!}</p>
                                </div>
                            </div>
                        @endif

                    </div>

                    <form class="form-horizontal" method="post" action="{{ route('expense_add') }}">
                        {{ csrf_field() }}
                        <div class="box-body">

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="title" name="title" placeholder=""
                                           required value="{{ old('title') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="designation" class="col-sm-2 control-label">Designation</label>

                                <div class="col-sm-4">
                                    <select class="form-control" name="designation" id="designation"
                                            required="required">
                                        <option value="">Select</option>
                                        @foreach($departments as $department)
                                            <optgroup label="{{ $department->name }}">
                                                @foreach($department->designation as $designation)
                                                    <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="employee" class="col-sm-2 control-label">Employee</label>

                                <div class="col-sm-4">
                                    <select class="form-control" name="employee" id="employee"
                                            required="required">

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="date" class="col-sm-2 control-label">Date</label>
                                <div class="col-sm-4">
                                    <div class="input-group input-append date">
                                        <input type="text" class="form-control" readonly="readonly"
                                               value="{{ old('date') }}" name="date" id="date" required/>
                                        <span class="input-group-addon add-on"><span
                                                    class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="amount" class="col-sm-2 control-label">Amount</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" id="amount" name="amount" placeholder="{!! Session::get('settings')['currency'] !!}"
                                           required value="{{ old('amount') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="comments" class="col-sm-2 control-label">Comments</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" id="comments"
                                              name="comments">{{ old('comments') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-2">
                                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                            tabindex="-1" aria-hidden="true" name="publish" required>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="box-footer">
                            <div class="col-sm-12">
                                <div class="col-sm-4 col-md-offset-2">
                                    <button type="submit" class="btn btn-info"> Save</button>
                                </div>
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
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
        })
    </script>
    @endsection