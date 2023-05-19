@extends('layouts.admin.admin')

@section('admin.content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавление категории</h1>
    </div>

    <div class="d-flex flex-wrap  flex-column w-100">
        <form class="row g-3 " action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="col-md-12">
                <label for="name" class="form-label">Название</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" name="published" type="checkbox" id="published">
                    <label class="form-check-label" for="published">
                        Опубликовать
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
    
    
    @php
        $message = 'Some message'
    @endphp
   
@endsection