@extends('Dashboard.layout.master')
@section('title', __('messages.permissions_modules') )
@section('content')
    <div class="index">
        <div class="content">
            <div class="fillter">

                <div class="select">
                    {{-- <select class="form-select" aria-label="Default select example">
                        <option selected>نوع المشروع</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>حالة المشروع</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select> --}}
                    <a href="{{ route('admin.permissions.create_module') }}">
                        <i class="fa-solid fa-square-plus"></i></a>
                </div>
            </div>


            <div class="table_data">
                <div class="table-responsive mt-1">

                    {!! $dataTable->table(
                        [
                            'class' => 'table_expenses table_topic table table-striped table-bordered',
                        ],
                        true,
                    ) !!}
                </div>
            </div>


        </div>
    </div>
@endsection

@section('script')
    {{ $dataTable->scripts() }}
@endsection
