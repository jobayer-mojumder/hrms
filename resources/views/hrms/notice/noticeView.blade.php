@extends('layouts.master')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h4 class="box-title">Notice info</h4>
                    </div>
                    <form class="form-horizontal">
                        <div class="box-body">

                            <div class="form-group">
                                <label for="title" class="col-sm-2">Title</label>
                                <div class="col-sm-10">
                                    <p class="no-border" >{{ $notice->title }}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="short_details" class="col-sm-2">Short Details</label>
                                <div class="col-sm-10">
                                    <p class="no-border" >{{ $notice->short_details }}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="details" class="col-sm-2">Details</label>
                                <div class="col-sm-10">
                                    <span class="no-border" >{!! $notice->details !!}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2">Publish</label>
                                <div class="col-sm-2">
                                    <p class="no-border">{{ $notice->publish == 1 ? 'Yes' : 'No'}}</p>
                                </div>
                            </div>

                        </div>
                        <div class="box-footer">
                            <div class="col-sm-12">
                                <div class="col-sm-1 col-md-offset-11">
                                    <a href="{{ route('notice_edit', ['id' => $notice->id ]) }}" class="btn btn-info"> Edit Info</a>
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