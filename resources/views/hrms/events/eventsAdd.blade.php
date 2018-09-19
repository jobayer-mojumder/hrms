@extends('layouts.master')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h4 class="box-title">New Event</h4>
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

                    <form class="form-horizontal" method="post" action="{{ route('events_add') }}">
                        {{ csrf_field() }}
                        <div class="box-body">

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="title" name="name" placeholder=""
                                           required value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="start_datetime" class="col-sm-2 control-label">Start Date & Time</label>
                                <div class="col-sm-3">
                                    <div class="input-group input-append">
                                        <input type="text" class="form-control" readonly="readonly"
                                               value="{{ old('start_datetime') }}" id="start_datetime"  required/>
                                        <span class="input-group-addon add-on"><span
                                                    class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="end_datetime" class="col-sm-2 control-label">End Date & Time</label>
                                <div class="col-sm-3">
                                    <div class="input-group input-append">
                                        <input type="text" class="form-control" readonly="readonly"
                                               value="{{ old('end_datetime') }}" id="end_datetime"/>
                                        <span class="input-group-addon add-on"><span
                                                    class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="details" class="col-sm-2 control-label">Details</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="details"
                                              name="details">{{ old('details') }}</textarea>
                                </div>
                            </div>
                            <script type="text/javascript">
                                CKEDITOR.replace("details", {height: "200", width: "100%"});
                            </script>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Publish</label>
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

        $(function () {
            $('#start_datetime').datetimepicker({
                //format: 'yyyy-mm-dd HH:ii P',
                format: 'yyyy-mm-dd hh:ii',
                autoclose: 'true',
                todayHighlight: 'true',
                minuteStep: 15,
                clearBtn: 'true',
            });

            $('#end_datetime').datetimepicker({
                //format: 'yyyy-mm-dd HH:ii P',
                format: 'yyyy-mm-dd hh:ii',
                autoclose: 'true',
                todayHighlight: 'true',
                minuteStep: 15,
                clearBtn: 'true',
            });
        });
    </script>
@endsection