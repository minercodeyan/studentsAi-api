@extends(backpack_view('blank'))
@section('content')
<form action="" class="">
    @csrf
    <label for="avatar">Choose a profile picture:</label>

    <input type="file"
           id="avatar" name="avatar"
           accept="image/png, image/jpeg">
    <button class="btn btn-primary" type="submit">Загрузить</button>
</form>

@endsection
