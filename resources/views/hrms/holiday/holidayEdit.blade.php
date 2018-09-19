@extends('layouts.master')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h4 class="box-title">Holiday info edit</h4>
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
                            <div class="col-sm-offset-3 col-sm-6 alert-message">
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button>
                                    <p><i class="icon fa fa-check"></i> {!! session('smsg') !!}</p>
                                </div>
                            </div><br>
                        @endif

                        @if(Session::has('emsg'))
                            <div class="col-sm-offset-3 col-sm-6 alert-message">
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button>
                                    <p><i class="icon fa fa-ban"></i> {!! session('emsg') !!}</p>
                                </div>
                            </div>
                        @endif

                    </div>

                    <form class="form-horizontal" method="post"
                          action="{{ route('holiday_edit', ['id'=> $holiday->id]) }}"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="name" name="name" placeholder=""
                                           required value="{{ $holiday->name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Start Date</label>
                                <div class="col-sm-4">
                                    <div class="input-group input-append date" id="start_date" style="width:200px;" >
                                        <input type="text" class="form-control" name="start_date" id="start_date_text" readonly="readonly" value="{{ date('Y-m-d', strtotime($holiday->start_date)) }}" required />
                                        <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar" id="start_date"></span></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">End Date</label>
                                <div class="col-sm-3">
                                    <div class="input-group input-append date" id="end_date" style="width:200px;" >
                                        <input type="text" class="form-control" name="end_date" id="end_date_text" readonly="readonly" value="{{ date('Y-m-d', strtotime($holiday->end_date)) }}" required />
                                        <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar" id="end_date"></span></span>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <input type="checkbox" id="same_as" >&nbsp;Same as Start date
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Publish</label>
                                <div class="col-sm-2">
                                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                            tabindex="-1" aria-hidden="true" name="publish" required>
                                        <option value="1" {{ $holiday->publish == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ $holiday->publish == 0 ? 'selected' : '' }}>No</option>
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
            $('#same_as').on('change', function () {
                if (this.checked){
                    $('#end_date_text').val($('#start_date_text').val());
                }else {
                    $('#end_date').val('');
                }
            });

            $('#start_date_text').on('change', function () {
                if ($('#same_as').is(":checked")){
                    $('#end_date_text').val($('#start_date_text').val());
                }else {
                    $('#end_date').val('');
                }
            });

        });
    </script>
@endsection