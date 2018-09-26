@extends('layouts.master')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h4 class="box-title">Event info</h4>
                    </div>
                    <form class="form-horizontal">
                        <div class="box-body">

                            <div class="form-group">
                                <label for="title" class="col-sm-2">Event Name</label>
                                <div class="col-sm-10">
                                    <p class="no-border" >{{ $events->name}}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="title" class="col-sm-2">Event Start</label>
                                <div class="col-sm-10">
                                    <p class="no-border" >{{ date('d F-Y, h:i A', strtotime($events->start_datetime)) }}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="title" class="col-sm-2">Event End</label>
                                <div class="col-sm-10">
                                    <p class="no-border" >{{ date('d F-Y, h:i A', strtotime($events->end_datetime)) }}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="details" class="col-sm-2">Details</label>
                                <div class="col-sm-10">
                                    <span class="no-border" >{!! $events->details !!}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2">Publish</label>
                                <div class="col-sm-2">
                                    <p class="no-border">{{ $events->publish == 1 ? 'Yes' : 'No'}}</p>
                                </div>
                            </div>

                        </div>
                        <div class="box-footer">
                            <div class="col-sm-12">
                                <div class="col-sm-1">
                                    <a href="{{ route('events') }}" class="btn btn-info"> Back</a>
                                </div>
                                <div class="col-sm-1 col-md-offset-10">
                                    <a href="{{ route('events_edit', ['id' => $events->id ]) }}" class="btn btn-info"> Edit Info</a>
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