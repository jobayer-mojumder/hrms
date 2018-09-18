@extends('layouts.master')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h4 class="box-title">Working Days</h4>
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
                                    <p><i class="icon fa fa-ban"></i> {!! session('smsg') !!}</p>
                                </div>
                            </div>
                        @endif

                    </div>

                    <form class="form-horizontal" method="post" action="{{ route('working') }}"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">

                            <div class="form-group">

                                @foreach($working as $row)
                                    <div class="col-sm-3">
                                        <label><input name="day[{{ $row->id }}]" {{ $row->status == 1 ? 'checked' : '' }} class="flat-blue" type="checkbox"> &nbsp;&nbsp; {{ $row->day }} </label>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                        <div class="box-footer">
                            <div class="col-sm-12">
                                <div class="col-sm-3 col-md-offset-5">
                                    <button type="submit" class="btn btn-info"> Update</button>
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