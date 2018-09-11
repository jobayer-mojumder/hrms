@extends('layouts.master')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header">
                    <h4 class="box-title">Employees</h4>
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

                <div class="col-sm-12 add-button" >
                    <a href="{{ route('employee_add') }}" class="btn  btn-primary btn-flat">Add new Employee</a>
                    <br>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="" class="table table-striped">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th style="text-align: center;">Department</th>
                            <th style="text-align: center;">Designation</th>
                            <th style="text-align: center;">Contact</th>
                            <th style="text-align: center;"></th>
                            <th style="text-align: center;"></th>
                            <th style="text-align: center;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i = 1; @endphp
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $i++ }}</td>

                                <td>{{ $employee->first_name.' '.$employee->last_name }}</td>

                                <td style="text-align: center;">{{ $employee->officeinfo->designation->department->name }}</td>

                                <td style="text-align: center;">{{ $employee->officeinfo->designation->name }}</td>

                                <td style="text-align: center;">{{ $employee->contactinfo->mobile }}</td>

                                <td style="text-align: center;"><a href="{{ route('employee_view', ['id' => $employee->id ]) }}">View</a></td>

                                <td style="text-align: center;"><a href="{{ route('employee_edit', ['id' => $employee->id ]) }}">Edit</a></td>

                                <td style="text-align: center;"><a href="JavaScript:del('{{ route('employee_delete', ['id' => $employee->id]) }}')">Delete</a></td>
                            </tr>
                        @endforeach
                        <tbody>
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