@extends(backpack_view('blank'))

@php
    $widgets['before_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => trans('backpack::base.welcome'),
        'content'     => trans('backpack::base.use_sidebar'),
        'button_link' => backpack_url('logout'),
        'button_text' => trans('backpack::base.logout'),
    ];

@endphp

@section('content')
    <p>Статистика</p>
    <canvas id="myChart" style="width:100%;max-width:700px; margin: 40px 0px"></canvas>
@endsection

@php
$widgets['after_content'][]=[
    'type'    => 'div',
    'class'   => 'row ',
    'content'=>[[
    'type'          => 'progress_white',
    'class'         => 'card mb-2 red',
    'value'         => \App\Models\Student::query()->max('id'),
    'description'   => 'Зарегистрированных клиентов.',
'progress'      => \App\Models\User::query()->count()/100*100, // integer
'progressClass' => 'progress-bar bg-primary',
'hint'          => '100 для нового уровня.',
],
[
    'type'          => 'progress_white',
'class'         => 'card mb-2',
'value'         => '11',
'description'   => 'Работников.',
'progress'      => 57, // integer
'progressClass' => 'progress-bar bg-primary',
'hint'          => '50 для нового уровня.',
],
[
    'type'          => 'progress_white',
'class'         => 'card mb-2',
'value'         => \App\Models\Group::query()->count(),
'description'   => 'Групп сформировано.',
'progress'      => \App\Models\Group::query()->count()/20*100, // integer
'progressClass' => 'progress-bar bg-primary',
'hint'          => '20 для нового уровня.',
]
]];
$widgets['after_content'][]=[
    'type'     => 'script',
    'content'  => asset('js/sexChart.js'),
]



@endphp
