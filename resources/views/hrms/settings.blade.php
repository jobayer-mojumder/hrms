@extends('layouts.master')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h4 class="box-title">Company Settings</h4>
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

                    <form class="form-horizontal" method="post" action="{{ route('settings') }}"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Company Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="name" name="name" placeholder=""
                                           required value="{{ $settings->name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address" class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" id="address"
                                              name="address">{{ $settings->address }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="email" name="email" placeholder=""
                                           value="{{ $settings->email }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone" class="col-sm-2 control-label">Phone</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder=""
                                           value="{{ $settings->phone }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="website" class="col-sm-2 control-label">Website</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="website" name="website" placeholder=""
                                           value="{{ $settings->website }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="fax" class="col-sm-2 control-label">Fax</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="fax" name="fax" placeholder=""
                                           value="{{ $settings->fax }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="logo" class="col-sm-2 control-label">Company Logo</label>
                                <div class="col-sm-6">
                                    <input value="" class="form-control" type="file" id="logo" name="logo">
                                    <div class="image-emp">
                                        @php
                                            if ($settings->logo) {
                                                $src = $settings->logo_path.$settings->logo;
                                            }else{
                                                $src =  asset('public/assets/employee') .'/no_images.png';
                                            }
                                        @endphp
                                        <img src="{{ asset($src) }}" width="200px">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="box-footer">
                            <div class="col-sm-12">
                                <div class="col-sm-4 col-md-offset-4">
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