@extends('layouts.admin.admin')

@section('admin.content')

    @include('admin.alerts')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Категории</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary">Добавить</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        @if (!empty($categories))
            <table class="table table-striped table-sm">
                <thead class="table-light">
                    <tr>
                        <th scope="col" class="col-1">ID</th>
                        <th scope="col" class="col-6">Название</th>
                        <th scope="col" class="col-2">URL</th>
                        <th scope="col" class="col-1 text-center">Черновик</th>
                        <th scope="col" class="col-1 text-center">Управление</th>
                    </tr>
                </thead>
                <tbody class="ajax-tbody">
                    @foreach ($categories as $category)
                       @include('admin.category._item', ['category' => $category])
                    @endforeach
                    
                </tbody>
            </table>    
        @else
            <h2>Нет доступных категорий</h2>
        @endif

    </div>

        {{ $categories->links() }}

@endsection