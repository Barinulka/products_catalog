@extends('layouts.app')

@section('title') 
    {{ $title }} 
@endsection
    
@section('content')

@if (count($goods) > 0)
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
        @foreach ($goods as $good)
            <div class="col">
                <div class="card shadow-sm">
                
                @if ($good->image)
                    <img src="{{ asset('storage/' . $good->image) }}" alt="logo" style="width: 100%;">
                @else
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: " preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>                    
                @endif

                <div class="card-body">
                    <h4>{{ $good->name }}</h4>
                    <p class="card-text">{{ $good->description }}</p>
                    <p class="card-text"><small class="text-muted">{{ $good->category->name }}</small></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{ route('catalog.view', ['url' => $good->url]) }}" class="btn btn-sm btn-outline-secondary">Смотреть</a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <h2 class="text-center">Список избранного пуст</h2>
@endif

{{-- <div class="mt-5">
    {{ $goods->links() }}
</div> --}}
@endsection