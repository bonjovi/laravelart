@extends('layouts.inner')

@section('content')
    <h1 class="title title_basegrey title_centered">{{ $title }}</h1>
    {!! $content !!}
@endsection