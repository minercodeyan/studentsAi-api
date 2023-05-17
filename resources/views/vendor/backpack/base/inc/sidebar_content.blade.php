{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}">
        <i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
{{-- <li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-arrows"></i>Сущности</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-question"></i>Пользователи</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-address-book"></i> Роли</a></li>
    </ul>
</li>--}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-question"></i>Пользователи</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-address-book"></i> Роли</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('group') }}"><i class="nav-icon la la-group"></i> Группы</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('student') }}"><i class="nav-icon la la-people-carry"></i> Обучающиеся</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('emailbroadcast') }}"><i class="nav-icon la la-mail-bulk"></i> Email рассылки</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('test') }}"><i class="nav-icon la la-etsy"></i> Тесты</a></li>
