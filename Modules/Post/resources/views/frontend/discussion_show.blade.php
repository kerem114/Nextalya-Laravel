@extends('frontend.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/template.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/add-post-create-discussion.css') }}">
@endsection
@section('content')
   <div class="col-lg-6 col-md-8 col-12 discussion-post-area">
                <!-- Aşama 2: Yayınlanmış Tartışma -->
    <div id="discussion-post-section">
        <div class="discussion-post-header">
            <div class="discussion-post-profile">
              <img src="{{ asset('storage/' . $data->user->avatar) }}" alt="Profile" class="discussion-post-profile-img" />
               <div class="discussion-post-user-info">
                   <div class="discussion-post-user-name">{{ $data->user->name }}</div>
                   <div class="discussion-post-user-nickname">{{ '@' . $data->user->username }}</div>
               </div>
            </div>

        </div>
        <div class="discussion-post-title" id="posted-title">{{ $data->title }}</div>
        <p class="discussion-post-description" id="posted-description">{{ $data->description }}</p>
        <img id="posted-image" class="posted-image" src="{{ asset('storage/discussion/'.$data->image) }}" alt="Post Image" />

    </div>
    </div>

@endsection
