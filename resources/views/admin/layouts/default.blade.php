@extends('admin.layouts.master')
@section('content')
@include('admin/layouts/header/header')
@include('admin/layouts/sidebar/sidebar')
<div class="main-content">
    <div class="page-content">
        {{ $slot }}
    </div>
</div>
@include('admin/layouts/footer')

@push('css')
@stack('style')
@endpush

@push('scripts')
@stack('script')
@endpush

@endsection