@extends('Dashboard.layout.master')
@section('title', __('messages.edit_module') )
@section('content')
<div class="add-projects">
    <div class="content">
        <div class="head">
            <h4> {{ __('messages.edit_module') }}</h4>
        </div>
        @include('Dashboard.permission_modules.__form')
    </div>
</div>
@endsection

@section('script')
@endsection
