@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.status.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.status.fields.name')</th>
                            <td field-key='name'>{{ $status->name }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#projects" aria-controls="projects" role="tab" data-toggle="tab">Projects</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="projects">
<table class="table table-bordered table-striped {{ count($projects) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
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

            <p>&nbsp;</p>

            <a href="{{ route('admin.statuses.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop

