@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.meetings.title')</h3>
    @can('meeting_create')
    <p>
        <a href="{{ route('admin.meetings.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
    </p>
    @endcan

    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($meetings) > 0 ? 'datatable' : '' }} @can('meeting_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('meeting_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('global.meetings.fields.name')</th>
                        <th>@lang('global.meetings.fields.project')</th>
                        <th>@lang('global.meetings.fields.city')</th>
                        <th>@lang('global.meetings.fields.start-date')</th>
                        <th>@lang('global.meetings.fields.end-date')</th>
                        <th>@lang('global.meetings.fields.is-active')</th>
                                                <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($meetings) > 0)
                        @foreach ($meetings as $meeting)
                            <tr data-entry-id="{{ $meeting->id }}">
                                @can('meeting_delete')
                                    <td></td>
                                @endcan

                                <td field-key='name'>{{ $meeting->name }}</td>
                                <td field-key='project'>{{ $meeting->project->name ?? '' }}</td>
                                <td field-key='city'>{{ $meeting->city }}</td>
                                <td field-key='start_date'>{{ $meeting->start_date }}</td>
                                <td field-key='end_date'>{{ $meeting->end_date }}</td>
                                <td field-key='is_active'>{{ $meeting->is_active }}</td>
                                                                <td>
                                    @can('meeting_view')
                                    <a href="{{ route('admin.meetings.show',[$meeting->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('meeting_edit')
                                    <a href="{{ route('admin.meetings.edit',[$meeting->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('meeting_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.meetings.destroy', $meeting->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="11">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('meeting_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.meetings.mass_destroy') }}';
        @endcan

    </script>
@endsection