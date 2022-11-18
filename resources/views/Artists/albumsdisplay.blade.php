@extends('layouts.artists')
@section('content')

<body>
	<h1 class="py-4">MY ALBUMS</h1>
@foreach($data['albums'] as $item)
<div class="albums-single">
    <img src="{{asset('/assets/uploads/albums/'.$item->album) }}" alt="" width="100%">
</div>
@endforeach


@endsection