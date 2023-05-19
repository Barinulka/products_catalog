@extends('layouts.app')

@section('title') 
    {{ $title }} 
@endsection
    
@section('content')

@if (count($goods) > 0)
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3" id="catalog-list">
        @include('goods._items', ['goods' => $goods]);
    </div>
@else
    <h2 class="text-center">Каталог пуст</h2>
@endif

<div class="mt-5">
    {{ $goods->links() }}
</div>
@endsection