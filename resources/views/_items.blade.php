@foreach ($categories as $cat)
    <div class="col">
        <div class="card-body">
            <a href="{{ route('category.view', ['url' => $cat->url]) }}"><h4>{{ $cat->name }}</h4></a>
        </div>
    </div>
@endforeach