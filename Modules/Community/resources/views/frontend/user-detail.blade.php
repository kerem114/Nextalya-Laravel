@extends('frontend.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/template.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/community-collections.css') }}">
@endsection
@section('content')
    <livewire:community::userdetail :userId="$user->id"/>
@section('js')
<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
@endsection
@endsection
