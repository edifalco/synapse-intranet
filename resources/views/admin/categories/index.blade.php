@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.categories.title')</h3>
    @can('category_create')
    <p>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
    </p>
    @endcan

    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($categories) > 0 ? 'datatable' : '' }} @can('category_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('category_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('global.categories.fields.name')</th>
                                                <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($categories) > 0)
                        @foreach ($categories as $category)
                            <tr data-entry-id="{{ $category->id }}">
                                @can('category_delete')
                                    <td></td>
                                @endcan

                                <td field-key='name'>{{ $category->name }}</td>
                                                                <td>
                                    @can('category_view')
                                    <a href="{{ route('admin.categories.show',[$category->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('category_edit')
                                    <a href="{{ route('admin.categories.edit',[$category->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('category_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.categories.destroy', $category->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('category_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.categories.mass_destroy') }}';
        @endcan

    </script>
@endsection