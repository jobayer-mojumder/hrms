@extends('layouts.master')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h4 class="box-title">Expenses</h4>
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
                        <a href="{{ route('expense_add') }}" class="btn  btn-primary btn-flat">Add new Expense</a>
                        <br>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="" class="table table-striped">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th style="text-align: center;">Employee</th>
                                <th style="text-align: center;">Amount</th>
                                <th style="text-align: center;">Date</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 1; @endphp
                            @foreach ($expenses as $result)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $result->title }}</td>
                                    <td style="text-align: center;">{{ $result->employee->first_name.' '.$result->employee->last_name }}</td>
                                    <td style="text-align: center;">{{ Session::get('settings')['currency'] }} {{ $result->amount }}</td>
                                    <td style="text-align: center;">{{ date('d M, Y', strtotime($result->date)) }}</td>
                                    <td style="text-align: center;"><img
                                                src="{{ asset('public/admin_images') }}{{ $result->status == 1 ? '/yes.png': '/no.png' }}"></td>

                                    <td style="text-align: center;"><a
                                                href="{{ route('expense_view', ['id' => $result->id ]) }}">View</a></td>
                                    <td style="text-align: center;"><a
                                                href="{{ route('expense_edit', ['id' => $result->id ]) }}">Edit</a></td>

                                    <td style="text-align: center;"><a
                                                href="JavaScript:del('{{ route('expense_delete', ['id' => $result->id]) }}')">Delete</a>
                                    </td>
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
        $(document).ready(function () {
            var allTable = $('table').DataTable({
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": false,
                "bInfo": true,
                "bAutoWidth": false,
            })
        });
    </script>
@endsection