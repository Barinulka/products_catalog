@extends('layouts.admin.admin')

@section('admin.content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактирование пользователя "{{ $user->name }}"</h1>
    </div>

    <div class="d-flex flex-wrap  flex-column w-100">
        <form class="row g-3 " action="{{ route('users.update', ['user' => $user]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <label for="name" class="form-label">Имя</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $user->name }}">
                
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $user->email }}">
                
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" name="is_admin" @if($user->is_admin == 1) checked @endif type="checkbox" id="is_admin">
                    <label class="form-check-label" for="is_admin">
                        Сделать админом
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
    
   
@endsection