@extends('layouts.app')

@section('title') 
    {{ $title }} 
@endsection
    
@section('content')
    <div class="row row-cols-12 g-3">
        <h2>Популярные категории</h2>
    </div>
    <div class="row d-flex flex-column  row-cols-12 g-3 pt-5">
        @include('_items', ['categories' => $categories])
    </div>
@endsection