@extends('layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h4 class="box-title">Payroll</h4>
                    </div>
                    @if(Session::has('smsg'))
                        <div class="col-sm-offset-3 col-sm-6">
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p><i class="icon fa fa-check"></i> {!! session('smsg') !!}</p>
                            </div>
                        </div>
                    @endif

                    @if(Session::has('emsg'))
                        <div class="col-sm-offset-3 col-sm-6">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-ban"></i> {!! session('smsg') !!}</h4>
                            </div>
                        </div>
                    @endif

                    <div class="col-sm-12 add-button" >
                        <a href="{{ route('payroll_add') }}" class="btn  btn-primary btn-flat">New Payroll</a>
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
                            @foreach ($payrolls as $payroll)
                                <tr>
                                    <td>{{ $i++ }}</td>

                                    <td>{{ $payroll->employee->first_name.' '.$payroll->employee->last_name }}</td>

                                    <td style="text-align: center;">{{ $payroll->employee->officeinfo->designation->department->name }}</td>

                                    <td style="text-align: center;">{{ $payroll->employee->officeinfo->designation->name }}</td>

                                    <td style="text-align: center;">{{ $payroll->employee->contactinfo->mobile }}</td>

                                    <td style="text-align: center;"><a href="{{ route('payroll_view', ['id' => $payroll->id ]) }}">View</a></td>

                                    <td style="text-align: center;"><a href="{{ route('payroll_edit', ['id' => $payroll->id ]) }}">Edit</a></td>

                                    <td style="text-align: center;"><a href="JavaScript:del('{{ route('payroll_delete', ['id' => $payroll->id]) }}')">Delete</a></td>
                                </tr>$payroll
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