@foreach ($reviews as $review)
    <div class="col-md-10 p-2">
        <div class="card p-2">
           <h5>{{ $review->name }}:</h5>
           <p class="card-text">{{ $review->message }}</p>
        </div>
    </div>
@endforeach