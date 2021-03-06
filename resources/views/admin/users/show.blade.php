@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.users.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.users.fields.name')</th>
                            <td field-key='name'>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.users.fields.email')</th>
                            <td field-key='email'>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.users.fields.role')</th>
                            <td field-key='role'>
                                @foreach ($user->role as $singleRole)
                                    <span class="label label-info label-many">{{ $singleRole->title }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#invoices" aria-controls="invoices" role="tab" data-toggle="tab">Invoices</a></li>
<li role="presentation" class=""><a href="#invoices" aria-controls="invoices" role="tab" data-toggle="tab">Invoices</a></li>
<li role="presentation" class=""><a href="#invoices" aria-controls="invoices" role="tab" data-toggle="tab">Invoices</a></li>
<li role="presentation" class=""><a href="#invoices" aria-controls="invoices" role="tab" data-toggle="tab">Invoices</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="invoices">
<table class="table table-bordered table-striped {{ count($invoices) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.invoices.fields.user')</th>
                        <th>@lang('global.invoices.fields.project')</th>
                        <th>@lang('global.invoices.fields.expense-type')</th>
                        <th>@lang('global.invoices.fields.meeting')</th>
                        <th>@lang('global.invoices.fields.contingency')</th>
                        <th>@lang('global.invoices.fields.date')</th>
                        <th>@lang('global.invoices.fields.due-date')</th>
                        <th>@lang('global.invoices.fields.provider')</th>
                        <th>@lang('global.invoices.fields.invoice-subtotal')</th>
                        <th>@lang('global.invoices.fields.pm')</th>
                        <th>@lang('global.invoices.fields.pm-approval-date')</th>
                        <th>@lang('global.invoices.fields.finance')</th>
                        <th>@lang('global.invoices.fields.finance-approval-date')</th>
                        <th>@lang('global.invoices.fields.created-by')</th>
                                                <th>&nbsp;</th>

        </tr>
    </thead>

    <tbody>
        @if (count($invoices) > 0)
            @foreach ($invoices as $invoice)
                <tr data-entry-id="{{ $invoice->id }}">
                    <td field-key='user'>{{ $invoice->user->name ?? '' }}</td>
                                <td field-key='project'>{{ $invoice->project->name ?? '' }}</td>
                                <td field-key='expense_type'>{{ $invoice->expense_type->name ?? '' }}</td>
                                <td field-key='meeting'>{{ $invoice->meeting->name ?? '' }}</td>
                                <td field-key='contingency'>{{ $invoice->contingency->name ?? '' }}</td>
                                <td field-key='date'>{{ $invoice->date }}</td>
                                <td field-key='due_date'>{{ $invoice->due_date }}</td>
                                <td field-key='provider'>{{ $invoice->provider->name ?? '' }}</td>
                                <td field-key='invoice_subtotal'>{{ $invoice->invoice_subtotal }}</td>
                                <td field-key='pm'>{{ $invoice->pm->name ?? '' }}</td>
                                <td field-key='pm_approval_date'>{{ $invoice->pm_approval_date }}</td>
                                <td field-key='finance'>{{ $invoice->finance->name ?? '' }}</td>
                                <td field-key='finance_approval_date'>{{ $invoice->finance_approval_date }}</td>
                                <td field-key='files'>@if($invoice->files)<a href="{{ asset(env('UPLOAD_PATH').'/' . $invoice->files) }}" target="_blank">Download file</a>@endif</td>
                                <td field-key='created_by'>{{ $invoice->created_by->name ?? '' }}</td>
                                                                <td>
                                    @can('invoice_view')
                                    <a href="{{ route('admin.invoices.show',[$invoice->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('invoice_edit')
                                    <a href="{{ route('admin.invoices.edit',[$invoice->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('invoice_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.invoices.destroy', $invoice->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="28">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="invoices">
<table class="table table-bordered table-striped {{ count($invoices) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.invoices.fields.user')</th>
                        <th>@lang('global.invoices.fields.project')</th>
                        <th>@lang('global.invoices.fields.expense-type')</th>
                        <th>@lang('global.invoices.fields.meeting')</th>
                        <th>@lang('global.invoices.fields.contingency')</th>
                        <th>@lang('global.invoices.fields.date')</th>
                        <th>@lang('global.invoices.fields.due-date')</th>
                        <th>@lang('global.invoices.fields.provider')</th>
                        <th>@lang('global.invoices.fields.invoice-subtotal')</th>
                        <th>@lang('global.invoices.fields.pm')</th>
                        <th>@lang('global.invoices.fields.pm-approval-date')</th>
                        <th>@lang('global.invoices.fields.finance')</th>
                        <th>@lang('global.invoices.fields.finance-approval-date')</th>
                        <th>@lang('global.invoices.fields.created-by')</th>
                                                <th>&nbsp;</th>

        </tr>
    </thead>

    <tbody>
        @if (count($invoices) > 0)
            @foreach ($invoices as $invoice)
                <tr data-entry-id="{{ $invoice->id }}">
                    <td field-key='user'>{{ $invoice->user->name ?? '' }}</td>
                                <td field-key='project'>{{ $invoice->project->name ?? '' }}</td>
                                <td field-key='expense_type'>{{ $invoice->expense_type->name ?? '' }}</td>
                                <td field-key='meeting'>{{ $invoice->meeting->name ?? '' }}</td>
                                <td field-key='contingency'>{{ $invoice->contingency->name ?? '' }}</td>
                                <td field-key='date'>{{ $invoice->date }}</td>
                                <td field-key='due_date'>{{ $invoice->due_date }}</td>
                                <td field-key='provider'>{{ $invoice->provider->name ?? '' }}</td>
                                <td field-key='invoice_subtotal'>{{ $invoice->invoice_subtotal }}</td>
                                <td field-key='pm'>{{ $invoice->pm->name ?? '' }}</td>
                                <td field-key='pm_approval_date'>{{ $invoice->pm_approval_date }}</td>
                                <td field-key='finance'>{{ $invoice->finance->name ?? '' }}</td>
                                <td field-key='finance_approval_date'>{{ $invoice->finance_approval_date }}</td>
                                <td field-key='files'>@if($invoice->files)<a href="{{ asset(env('UPLOAD_PATH').'/' . $invoice->files) }}" target="_blank">Download file</a>@endif</td>
                                <td field-key='created_by'>{{ $invoice->created_by->name ?? '' }}</td>
                                                                <td>
                                    @can('invoice_view')
                                    <a href="{{ route('admin.invoices.show',[$invoice->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('invoice_edit')
                                    <a href="{{ route('admin.invoices.edit',[$invoice->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('invoice_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.invoices.destroy', $invoice->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="28">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="invoices">
<table class="table table-bordered table-striped {{ count($invoices) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.invoices.fields.user')</th>
                        <th>@lang('global.invoices.fields.project')</th>
                        <th>@lang('global.invoices.fields.expense-type')</th>
                        <th>@lang('global.invoices.fields.meeting')</th>
                        <th>@lang('global.invoices.fields.contingency')</th>
                        <th>@lang('global.invoices.fields.date')</th>
                        <th>@lang('global.invoices.fields.due-date')</th>
                        <th>@lang('global.invoices.fields.provider')</th>
                        <th>@lang('global.invoices.fields.invoice-subtotal')</th>
                        <th>@lang('global.invoices.fields.pm')</th>
                        <th>@lang('global.invoices.fields.pm-approval-date')</th>
                        <th>@lang('global.invoices.fields.finance')</th>
                        <th>@lang('global.invoices.fields.finance-approval-date')</th>
                        <th>@lang('global.invoices.fields.created-by')</th>
                                                <th>&nbsp;</th>

        </tr>
    </thead>

    <tbody>
        @if (count($invoices) > 0)
            @foreach ($invoices as $invoice)
                <tr data-entry-id="{{ $invoice->id }}">
                    <td field-key='user'>{{ $invoice->user->name ?? '' }}</td>
                                <td field-key='project'>{{ $invoice->project->name ?? '' }}</td>
                                <td field-key='expense_type'>{{ $invoice->expense_type->name ?? '' }}</td>
                                <td field-key='meeting'>{{ $invoice->meeting->name ?? '' }}</td>
                                <td field-key='contingency'>{{ $invoice->contingency->name ?? '' }}</td>
                                <td field-key='date'>{{ $invoice->date }}</td>
                                <td field-key='due_date'>{{ $invoice->due_date }}</td>
                                <td field-key='provider'>{{ $invoice->provider->name ?? '' }}</td>
                                <td field-key='invoice_subtotal'>{{ $invoice->invoice_subtotal }}</td>
                                <td field-key='pm'>{{ $invoice->pm->name ?? '' }}</td>
                                <td field-key='pm_approval_date'>{{ $invoice->pm_approval_date }}</td>
                                <td field-key='finance'>{{ $invoice->finance->name ?? '' }}</td>
                                <td field-key='finance_approval_date'>{{ $invoice->finance_approval_date }}</td>
                                <td field-key='files'>@if($invoice->files)<a href="{{ asset(env('UPLOAD_PATH').'/' . $invoice->files) }}" target="_blank">Download file</a>@endif</td>
                                <td field-key='created_by'>{{ $invoice->created_by->name ?? '' }}</td>
                                                                <td>
                                    @can('invoice_view')
                                    <a href="{{ route('admin.invoices.show',[$invoice->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('invoice_edit')
                                    <a href="{{ route('admin.invoices.edit',[$invoice->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('invoice_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.invoices.destroy', $invoice->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="28">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="invoices">
<table class="table table-bordered table-striped {{ count($invoices) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.invoices.fields.user')</th>
                        <th>@lang('global.invoices.fields.project')</th>
                        <th>@lang('global.invoices.fields.expense-type')</th>
                        <th>@lang('global.invoices.fields.meeting')</th>
                        <th>@lang('global.invoices.fields.contingency')</th>
                        <th>@lang('global.invoices.fields.date')</th>
                        <th>@lang('global.invoices.fields.due-date')</th>
                        <th>@lang('global.invoices.fields.provider')</th>
                        <th>@lang('global.invoices.fields.invoice-subtotal')</th>
                        <th>@lang('global.invoices.fields.pm')</th>
                        <th>@lang('global.invoices.fields.pm-approval-date')</th>
                        <th>@lang('global.invoices.fields.finance')</th>
                        <th>@lang('global.invoices.fields.finance-approval-date')</th>
                        <th>@lang('global.invoices.fields.created-by')</th>
                                                <th>&nbsp;</th>

        </tr>
    </thead>

    <tbody>
        @if (count($invoices) > 0)
            @foreach ($invoices as $invoice)
                <tr data-entry-id="{{ $invoice->id }}">
                    <td field-key='user'>{{ $invoice->user->name ?? '' }}</td>
                                <td field-key='project'>{{ $invoice->project->name ?? '' }}</td>
                                <td field-key='expense_type'>{{ $invoice->expense_type->name ?? '' }}</td>
                                <td field-key='meeting'>{{ $invoice->meeting->name ?? '' }}</td>
                                <td field-key='contingency'>{{ $invoice->contingency->name ?? '' }}</td>
                                <td field-key='date'>{{ $invoice->date }}</td>
                                <td field-key='due_date'>{{ $invoice->due_date }}</td>
                                <td field-key='provider'>{{ $invoice->provider->name ?? '' }}</td>
                                <td field-key='invoice_subtotal'>{{ $invoice->invoice_subtotal }}</td>
                                <td field-key='pm'>{{ $invoice->pm->name ?? '' }}</td>
                                <td field-key='pm_approval_date'>{{ $invoice->pm_approval_date }}</td>
                                <td field-key='finance'>{{ $invoice->finance->name ?? '' }}</td>
                                <td field-key='finance_approval_date'>{{ $invoice->finance_approval_date }}</td>
                                <td field-key='files'>@if($invoice->files)<a href="{{ asset(env('UPLOAD_PATH').'/' . $invoice->files) }}" target="_blank">Download file</a>@endif</td>
                                <td field-key='created_by'>{{ $invoice->created_by->name ?? '' }}</td>
                                                                <td>
                                    @can('invoice_view')
                                    <a href="{{ route('admin.invoices.show',[$invoice->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('invoice_edit')
                                    <a href="{{ route('admin.invoices.edit',[$invoice->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('invoice_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.invoices.destroy', $invoice->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="28">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.users.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


