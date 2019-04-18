@extends('layouts.inner')

@section('content')
    <h1 class="title title_basegrey title_centered">{{ $page->title }}</h1>
    
    {!! $page->body !!}

    @foreach($errors->all() as $error)
        <p class="text flash flash_success">{{ $error }}</p>
    @endforeach

    @if(Session::has('message'))
        <br>
        <p class="text flash flash_success">{{ Session::get('message') }}</p>
    @endif

    @if(Request::is('contacts'))
        <div class="contacts">
            <div class="title title_middle">Обратная связь:</div>
            <form role="form" action="{{ route('contacts') }}" method="POST" enctype="multipart/form-data" class="contacts__form">
                {{ csrf_field() }}
                <div class="control-group account__control-group">
                    <label for="fio" class="text text_grey text_width120">
                        ФИО:
                    </label>
                    <input type="text" value="{{ old('fio') }}" name="fio" class="input">
                </div>
                <div class="control-group account__control-group">
                    <label for="email" class="text text_grey text_width120">
                        Email:
                    </label>
                    <input type="text" value="{{ old('email') }}" name="email" class="input">
                </div>
                <div class="control-group account__control-group">
                    <label for="message" class="text text_grey text_width120">
                        Описание:
                    </label>
                    <textarea name="message" class="textarea" cols="30" rows="10">{{ old('message') }}</textarea>
                </div>
                
                <input type="submit" value="Отправить" class="button account__savebutton">
            </form>
        </div>
    @endif
@endsection