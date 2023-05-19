@extends('layouts.admin.admin')

@section('admin.content')

    @include('admin.alerts')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Пользователи</h1>
        
    </div>

    <div class="table-responsive">
        @if (count($users) > 0)
            <table class="table table-striped table-sm">
                <thead class="table-light">
                    <tr>
                        <th scope="col" class="col-1">ID</th>
                        <th scope="col" class="col-4">Имя</th>
                        <th scope="col" class="col-4">Email</th>
                        <th scope="col" class="col-1 ">Управление</th>
                    </tr>
                </thead>
                <tbody class="ajax-tbody">
                    @foreach ($users as $user)
                       @include('admin.users._item', ['user' => $user])
                    @endforeach
                    
                </tbody>
            </table>    
        @else
            <h2>Нет доступных товаров</h2>
        @endif

    </div>

        {{ $users->links() }}

@endsection