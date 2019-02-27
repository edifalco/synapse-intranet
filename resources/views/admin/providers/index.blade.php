@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.providers.title')</h3>
    @can('provider_create')
    <p>
        <a href="{{ route('admin.providers.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
    </p>
    @endcan

    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($providers) > 0 ? 'datatable' : '' }} @can('provider_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('provider_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('global.providers.fields.name')</th>
                        <th>@lang('global.providers.fields.address')</th>
                        <th>@lang('global.providers.fields.postal-code')</th>
                        <th>@lang('global.providers.fields.city')</th>
                        <th>@lang('global.providers.fields.country')</th>
                        <th>@lang('global.providers.fields.phone')</th>
                        <th>@lang('global.providers.fields.contact-person')</th>
                        <th>@lang('global.providers.fields.email')</th>
                                                <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($providers) > 0)
                        @foreach ($providers as $provider)
                            <tr data-entry-id="{{ $provider->id }}">
                                @can('provider_delete')
                                    <td></td>
                                @endcan

                                <td field-key='name'>{{ $provider->name }}</td>
                                <td field-key='address'>{{ $provider->address }}</td>
                                <td field-key='postal_code'>{{ $provider->postal_code }}</td>
                                <td field-key='city'>{{ $provider->city }}</td>
                                <td field-key='country'>{{ $provider->country }}</td>
                                <td field-key='phone'>{{ $provider->phone }}</td>
                                <td field-key='contact_person'>{{ $provider->contact_person }}</td>
                                <td field-key='email'>{{ $provider->email }}</td>
                                                                <td>
                                    @can('provider_view')
                                    <a href="{{ route('admin.providers.show',[$provider->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('provider_edit')
                                    <a href="{{ route('admin.providers.edit',[$provider->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('provider_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.providers.destroy', $provider->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="13">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('provider_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.providers.mass_destroy') }}';
        @endcan

    </script>
@endsection