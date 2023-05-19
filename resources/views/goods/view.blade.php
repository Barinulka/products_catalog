@extends('layouts.app')

@section('title') 
    {{ $title }} 
@endsection

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4">
                                @if ($good->image)
                                    <a href="{{asset('storage/' . $good->image)}}" target="_blank">
                                        <img src="{{ asset('storage/' . $good->image) }}" alt="logo" width="250">
                                    </a>
                                @else
                                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: " preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>                    
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center"> <a href="{{ route('catalog.index') }}" style="text-decoration: none;"><i class="bi bi-arrow-left"></i> <span style="margin-left: 5px;">Назад</span></a> </div>
                            </div>
                            <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">{{ $good->name }}</span></div>
                            <p class="about">{{ $good->description }}</p>
                            <div class="sizes mt-5">
                                <h6 class="text">{{ $good->category->name }}</h6> 
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('goods._reviews', ['good' => $good, 'reviews' => $reviews])
@endsection