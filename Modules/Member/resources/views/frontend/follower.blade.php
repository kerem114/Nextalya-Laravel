@extends('frontend.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/template.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/search-page.css') }}">
@endsection

@section('content')
  <!-- Orta Alan: Followings -->
  <div class="col-lg-6 offset-lg-3 col-md-12 add-post-area">
    <div class="mb-3 border-bottom pb-2">
          <h5 class="mb-0">
              Takip Ettiklerin ({{ $followers->count() }})
          </h5>
      </div>
      <div class="mt-3">
          @foreach($followers as $user)
              <div class="d-flex align-items-center mb-3">
                  <img src="{{ asset('storage/' . $user->avatar) }}"
                       class="rounded-circle me-2 profile-img-sm" alt="{{ $user->username }}">
                  <div class="flex-grow-1">
                      <a href="{{ route('user.account', $user->username) }}">
                          <p class="text-dark">{{ $user->username }}</p>
                      </a>
                      <div class="small text-muted">
                          {{ $user->full_name }}
                      </div>
                  </div>

                  <!-- Takipten çık butonu -->
                  <form action="{{ route('follower.delete', $user->id) }}" method="POST" class="ms-auto">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-outline-danger">
                          Takipçiden çıkar
                      </button>
                  </form>
              </div>
          @endforeach

          @if($followers->isEmpty())
              <div class="text-center py-3 text-muted">
                 Kimse seni takip etmiyor.
              </div>
          @endif
      </div>
  </div>
@endsection
