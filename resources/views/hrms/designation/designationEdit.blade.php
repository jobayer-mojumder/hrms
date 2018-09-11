@extends('layouts.master')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h4 class="box-title">Edit Designation Info</h4>
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
                          action="{{ route('designation_edit', ['id'=>$designation->id]) }}">
                        {{ csrf_field() }}
                        <div class="box-body">

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="name" name="name" placeholder=""
                                           required value="{{ $designation->name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Department</label>
                                <div class="col-sm-6">
                                    <select class="form-control" required="required" name="department_id">
                                        <option value="">select</option>
                                        >
                                        @foreach ($departments as $result):
                                        <option @if($result->id == $designation->id) {{ 'selected' }} @endif value="{{ $result->id }}">{{ $result->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="rank" class="col-sm-2 control-label">Rank</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" id="rank" name="rank" placeholder=""
                                           required value="{{ $designation->rank }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" id="description"
                                              name="description">{{ $designation->description }}</textarea>
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