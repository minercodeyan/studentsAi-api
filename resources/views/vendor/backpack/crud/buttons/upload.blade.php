@if ($crud->hasAccess('update'))
    <a href="{{ url($crud->route.'/'.$entry->getKey().'/upload') }} " class="btn btn-xs btn-success"><i class="la la-inbox"></i> Загрузисть csv расписание</a>
@endif
