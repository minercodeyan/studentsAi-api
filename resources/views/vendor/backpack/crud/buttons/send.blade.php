@if ($crud->hasAccess('update'))
    <a href="{{ url($crud->route.'/'.$entry->getKey().'/send') }} " class="btn btn-xs btn-success"><i class="la la-inbox"></i> Разослать</a>
@endif
