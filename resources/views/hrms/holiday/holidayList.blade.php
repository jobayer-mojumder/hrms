@extends('layouts.master')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h4 class="box-title">Leave Category</h4>
                    </div>
                    @if(Session::has('smsg'))
                        <div class="col-sm-offset-3 col-sm-6 alert-message">
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p><i class="icon fa fa-check"></i> {!! session('smsg') !!}</p>
                            </div>
                        </div>
                    @endif

                    @if(Session::has('emsg'))
                        <div class="col-sm-offset-3 col-sm-6 alert-message">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p><i class="icon fa fa-ban"></i> {!! session('emsg') !!}</p>
                            </div>
                        </div>
                    @endif

                    <div class="col-sm-12 add-button">
                        <a href="{{ route('leave_add') }}" class="btn  btn-primary btn-flat">Add new leave</a>
                        <br>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="" class="table table-striped">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th style="text-align: center;">Days</th>
                                <th style="text-align: center;">Edit</th>
                                <th style="text-align: center;">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 1; @endphp
                            @foreach ($leaves as $result)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $result->name }}</td>

                                    <td style="text-align: center;">{{ $result->days }}</td>

                                    <td style="text-align: center;"><a href="{{ route('leave_edit', ['id' => $result->id ]) }}"><img src="{{ asset('public/admin_images/edit.png') }}"></a></td>

                                    <td style="text-align: center;"><a href="JavaScript:del('{{ route('leave_delete', ['id' => $result->id]) }}')"><img src="{{ asset('public/admin_images/del.png') }}"></a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var allTable= $('table').DataTable({
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": false,
                "bInfo": true,
                "bAutoWidth": false,
            })
        } );
    </script>
@endsection