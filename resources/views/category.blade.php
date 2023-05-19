@extends('layouts.app')

@section('title') 
    {{ $title }} 
@endsection
    
@section('content')
    <div class="row row-cols-12 g-3">
        <h2>{{ $category->name }}</h2>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3" id="catalog-list">
        @include('item', ['goods' => $goods, 'category' => $category])
    </div>
@endsection