@extends('Dashboard.master')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h4 class="mb-4">بيانات المستخدم</h4>

            <p><strong>الاسم:</strong> {{ $user->name }}</p>
            <p><strong>البريد الإلكتروني:</strong> {{ $user->email }}</p>
            <p><strong>تاريخ التسجيل:</strong> {{ $user->created_at->format('Y-m-d') }}</p>

            <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">
                <i class="fas fa-arrow-left"></i> رجوع
            </a>
        </div>
    </div>
</div>
@endsection
