@extends('layouts.app')

@section('title') 
    {{ $title }} 
@endsection
    
@section('content')
    <div class="row row-cols-12 g-3">
        <h2>Результаты поиска "{{ request()->search }}" </h2>
    </div>
    @if (count($results))
        <div class="row d-flex flex-column  row-cols-12 g-3 pt-5">
            <ul class="list-group list-group-numbered">
                @foreach ($results as $item)
                    <li class="list-group-item ">
                        
                        <a href="{{ route( $item->type . '.view', ['url' => $item->url]) }}">{{ $item->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    @else
        <div class="row d-flex flex-column  row-cols-12 g-3 pt-5">
            <h4>Поиск не дал результатов</h4>
        </div>
    @endif

    <div class="mt-5">
        {{ $results->appends(['search' => request()->search])->links() }}
    </div>
@endsection