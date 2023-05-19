@if (count($reviews))

    <div class="row d-flex justify-content-center py-3" id="review-list">
        @include('goods._reviews_lists', ['reviews' => $reviews])
    </div>
    {{ $reviews->links() }}
@else
<div class="row d-flex justify-content-center py-3" id="review-list">
    <div class="col-md-10 pt-2">
        <div class="card ">
            <h3 class="text-center p-3">Отзывов пока нет</h3>
        </div>
    </div>
</div>
@endif

<div class="row d-flex justify-content-center py-3">
    <div class="col-md-10">
        <div class="card">
            <form method="POST" action="{{ route('review.store') }}" data-update="{{ route('catalog.view', ['url' => $good->url]) }}" class="p-5" id="review-form">
                @csrf

                <input id="good_id" type="hidden" name="good_id" value="{{ $good->id }}" required autocomplete="name" autofocus>
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Имя</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                
                <div class="row mb-3">
                    <label for="message" class="col-md-4 col-form-label text-md-end">Сообщение</label>

                    <div class="col-md-6">
                        <textarea id="message" type="text" class="form-control @error('message') is-invalid @enderror" name="message" autocomplete="message" autofocus>{{ old('message') }}</textarea>

                        @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Отправить
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
