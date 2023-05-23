@foreach ($reviews as $review)
    <div class="col-md-10 p-2">
        <div class="card p-2">
           <h5>{{ $review->name }}:</h5>
           <p class="card-text">{{ $review->message }}</p>
            @if ($review->images)
                <div class="d-flex g-3">
                    @foreach ($review->images as $item)
                        <a href="{{asset('storage/' . $item->image)}}" target="_blank" class="m-2 ">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="logo" width="100" class="border border-2 border-info rounded">
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endforeach