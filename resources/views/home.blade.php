@extends('layouts.app')

@section('title') 
    {{ $title }} 
@endsection
    
@section('content')
<div class="row row-cols-1 row-cols-sm-3 row-cols-md-4 g-3">
    {{-- @forelse ($taskList as $task) --}}
        <div class="col">
            <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Эскиз" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Эскиз</text></svg>

            <div class="card-body">
                <h4>Тут какой-то тайтл</h4>
                <p class="card-text">Это более широкая карточка с вспомогательным текстом ниже как естественный ввод к дополнительному контенту. Этот контент немного длиннее.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Смотреть</button>
                    </div>
                </div>
            </div>
            </div>
        </div>
        
    {{-- @empty --}}
        {{-- <h2>Задач пока нет</h2> --}}
    {{-- @endforelse --}}
</div>
@endsection