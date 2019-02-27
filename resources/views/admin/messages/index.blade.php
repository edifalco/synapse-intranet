@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.messages.title')</h3>
    @can('message_create')
    <p>
        <a href="{{ route('admin.messages.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
    </p>
    @endcan

    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($messages) > 0 ? 'datatable' : '' }} @can('message_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('message_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('global.messages.fields.name')</th>
                        <th>@lang('global.messages.fields.email')</th>
                        <th>@lang('global.messages.fields.phone')</th>
                        <th>@lang('global.messages.fields.message')</th>
                                                <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($messages) > 0)
                        @foreach ($messages as $message)
                            <tr data-entry-id="{{ $message->id }}">
                                @can('message_delete')
                                    <td></td>
                                @endcan

                                <td field-key='name'>{{ $message->name }}</td>
                                <td field-key='email'>{{ $message->email }}</td>
                                <td field-key='phone'>{{ $message->phone }}</td>
                                <td field-key='message'>{{ $message->message }}</td>
                                                                <td>
                                    @can('message_view')
                                    <a href="{{ route('admin.messages.show',[$message->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('message_edit')
                                    <a href="{{ route('admin.messages.edit',[$message->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('message_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.messages.destroy', $message->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('message_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.messages.mass_destroy') }}';
        @endcan

    </script>
@endsection