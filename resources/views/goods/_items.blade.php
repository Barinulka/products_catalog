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
            
            <a href="{{ route('category.view', ['url' => $good->category->url]) }}" class="card-text pb-7"><small class="text-muted">{{ $good->category->name }}</small></a>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{ route('catalog.view', ['url' => $good->url]) }}" class="btn btn-sm btn-outline-secondary">Смотреть</a>
                </div>
                @auth
                @if ($good->hasFavorite())
                    <a href="{{ route('favorite.remove', ['good' => $good]) }}" class="add-to-favorite"><i class="bi bi-heart-fill"></i></a>
                @else
                    <a href="{{ route('favorite.add', ['good' => $good]) }}" class="add-to-favorite"><i class="bi bi-heart"></i></a>
                @endif
                @endauth
            </div>
        </div>
        </div>
    </div>
@endforeach