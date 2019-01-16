@extends('layouts.inner')

@section('content')
    <h1 class="title title_basegrey title_centered">{{ $page->title }}</h1>
    <!--{{ $page->getViews() }}-->
    {!! $page->body !!}
@endsection