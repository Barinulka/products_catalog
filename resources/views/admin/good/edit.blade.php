@extends('layouts.admin.admin')

@section('admin.content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактирование товара "{{ $good->name }}"</h1>
    </div>

    <div class="d-flex flex-wrap  flex-column w-100">
        <form class="row g-3 " action="{{ route('goods.update', ['good' => $good]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <label for="image" class="form-label">Лого</label>
                @if ($good->image)
                    <br>
                    <img src="{{asset('storage/' . $good->image)}}" alt="logo" width="250">
                @endif
                <input type="file" class="form-control form-control-file @error('image') is-invalid @enderror" name="image" id="image" value="{{ $good->image }}">
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-12">
                <label for="name" class="form-label">Название</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $good->name }}">
                
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-12">
                <label for="description" class="form-label">Описание</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Описание" rows="5" >{{ $good->description }}</textarea>

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-2">
                <label for="category_id" class="form-label">Категория</label>
                <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" aria-label="Выберите категорию">
                    <option>Выберите категорию</option>
                    @foreach ($categories as $id => $name)
                        <option value="{{ $id }}"
                        @if ($good->category_id == $id)
                            selected
                        @endif
                        >{{ $name }}</option>
                    @endforeach
                </select>
                
                @error('category_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" name="published" @if($good->is_published == 1) checked @endif type="checkbox" id="published">
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