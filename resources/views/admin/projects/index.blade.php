@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.projects.title')</h3>
    @can('project_create')
    <p>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
    </p>
    @endcan

    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($projects) > 0 ? 'datatable' : '' }} @can('project_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('project_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('global.projects.fields.name')</th>
                        <th>@lang('global.projects.fields.start-date')</th>
                        <th>@lang('global.projects.fields.end-date')</th>
                        <th>@lang('global.projects.fields.logo')</th>
                        <th>@lang('global.projects.fields.status')</th>
                                                <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($projects) > 0)
                        @foreach ($projects as $project)
                            <tr data-entry-id="{{ $project->id }}">
                                @can('project_delete')
                                    <td></td>
                                @endcan

                                <td field-key='name'>{{ $project->name }}</td>
                                <td field-key='start_date'>{{ $project->start_date }}</td>
                                <td field-key='end_date'>{{ $project->end_date }}</td>
                                <td field-key='logo'>@if($project->logo)<a href="{{ asset(env('UPLOAD_PATH').'/' . $project->logo) }}" target="_blank">Download file</a>@endif</td>
                                <td field-key='status'>{{ $project->status->name ?? '' }}</td>
                                                                <td>
                                    @can('project_view')
                                    <a href="{{ route('admin.projects.show',[$project->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('project_edit')
                                    <a href="{{ route('admin.projects.edit',[$project->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('project_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.projects.destroy', $project->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('project_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.projects.mass_destroy') }}';
        @endcan

    </script>
@endsection