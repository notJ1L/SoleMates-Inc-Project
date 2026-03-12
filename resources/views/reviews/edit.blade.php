@extends('layouts.app')

@section('title', 'Edit Review — SoulMates Inc.')

@section('content')
<div class="container py-5" style="max-width: 600px;">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.show', $review->product_id) }}">Product</a></li>
            <li class="breadcrumb-item active">Edit Review</li>
        </ol>
    </nav>

    <h2 class="mb-4">Edit Your Review</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('reviews.update', $review->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-semibold">Your Rating</label>
            <div class="d-flex gap-2">
                @for($i = 1; $i <= 5; $i++)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rating"
                               id="star{{ $i }}" value="{{ $i }}"
                               {{ (old('rating', $review->rating) == $i) ? 'checked' : '' }} required>
                        <label class="form-check-label" for="star{{ $i }}">{{ $i }} ★</label>
                    </div>
                @endfor
            </div>
            @error('rating') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">Your Review</label>
            <textarea name="body" rows="5"
                      class="form-control @error('body') is-invalid @enderror"
                      required>{{ old('body', $review->body) }}</textarea>
            @error('body') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Update Review</button>
            <a href="{{ route('products.show', $review->product_id) }}" class="btn btn-outline-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
