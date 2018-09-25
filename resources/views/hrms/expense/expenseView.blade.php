@extends('layouts.master')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h4 class="box-title">Expense info</h4>
                    </div>
                    <form class="form-horizontal">
                        <div class="box-body">

                            <div class="form-group">
                                <label for="title" class="col-sm-3 control-label">Expense Title</label>
                                <div class="col-sm-8">
                                    <p class="no-border" >{{ $expense->title}}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="title" class="col-sm-3 control-label">Employee Name</label>
                                <div class="col-sm-8">
                                    <p class="no-border" >{{ $expense->employee->first_name.' '.$expense->employee->last_name }}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="title" class="col-sm-3 control-label">Expense Amount</label>
                                <div class="col-sm-8">
                                    <p class="no-border" >{{ Session::get('settings')['currency'] }} {{ $expense->amount }}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="title" class="col-sm-3 control-label">Expense Date</label>
                                <div class="col-sm-8">
                                    <p class="no-border" >{{ date('d F-Y', strtotime($expense->date)) }}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="details" class="col-sm-3 control-label">Comments</label>
                                <div class="col-sm-8">
                                    <span class="no-border" >{{ $expense->comments }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">Status</label>
                                <div class="col-sm-3">
                                    <p class="no-border">{{ $expense->status == 1 ? 'Yes' : 'No'}}</p>
                                </div>
                            </div>

                        </div>
                        <div class="box-footer">
                            <div class="col-sm-12">
                                <div class="col-sm-1">
                                    <a href="{{ route('expense') }}" class="btn btn-info"> Back</a>
                                </div>
                                <div class="col-sm-1 col-md-offset-10">
                                    <a href="{{ route('expense_edit', ['id' => $expense->id ]) }}" class="btn btn-info"> Edit Info</a>
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