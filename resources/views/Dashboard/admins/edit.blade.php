@extends('Dashboard.layout.master')
@section('title', __('messages.edit_admin') )
@section('content')
<div class="add-projects">
    <div class="content">
        <div class="head">
            <h4>{{ __('messages.edit_admin') }}</h4>
        </div>
        @include('Dashboard.admins.__form')
    </div>
</div>
@endsection
@section('script')
@endsection
