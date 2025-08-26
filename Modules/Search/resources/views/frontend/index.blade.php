@extends('frontend.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/search-page.css') }}">
@endsection
@section('content')
            <div class="row justify-content-center">


                <div class="col-lg-6 col-md-8 col-12 middle-content">
                    <div class="search-page-container">

                  <form action="{{ route('search.products') }}" method="GET" class="d-flex mx-auto" id="custom-search">
                        <input class="form-control me-2 d-md-none" type="search" name="q" placeholder="Ara" aria-label="Search" onkeydown="if(event.key === 'Enter'){ this.form.submit(); }">
                        <button type="submit" class="d-none">Ara</button> <!-- Gizli submit -->
                    </form>

                        <!-- Product Cards Section -->
                        <div class="search-product-cards">
                            <div class="row">
                                <livewire:search::product/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
