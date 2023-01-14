@extends('dashboard::layouts.master')
@section('title') Dashboard  @endsection
@section('content')
@component('dashboard::components.breadcrumb')
@slot('li_1') Pages @endslot
@slot('title') Starter  @endslot
@endcomponent
@endsection
@section('script')
<script src="{{ URL::asset('/assets/dashboard/js/app.min.js') }}"></script>
@endsection
