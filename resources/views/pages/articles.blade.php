@extends('layouts.articlesMaster')
@section('content')
<div class="container">
    <h1>{{ $post->post_title }}</h1>
    <div>{!! $post->post_content !!}</div>
</div>
@endsection
