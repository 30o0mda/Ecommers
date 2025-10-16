@extends('Dashboard.master')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h4 class="mb-4">بيانات المستخدم</h4>

            <p><strong>الاسم:</strong> {{ $user->name }}</p>
            <p><strong> البريد الالكتروني:</strong> {{ $user->email}}</p>
            <p><strong>  رقم الهاتف :</strong> {{ $user->phone }}</p>
            <p><strong>  نوع المستخدم :</strong> {{ $user->role->label( ) }}</p>
            <p><strong>  حاله المستخدم :</strong> {{ $user->is_blocked->label( ) }}</p>
            <p><strong>تاريخ التسجيل:</strong> {{ $user->created_at->format('Y-m-d') }}</p>

                                        <!-- أزرار التحكم -->
                            <div class="mt-4 d-flex flex-wrap justify-content-start" style="gap: 10px;">

                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit" style="margin-left: 5px;"></i> تعديل
                                </a>

                                <form action="{{ route('users.delete', $user->id) }}" id="delete-form-{{ $user->id }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا المستخدم؟')">
                                        <i class="fas fa-trash" style="margin-left: 5px;"></i> حذف
                                    </button>
                                </form>


                                <a href="{{ route('users.index') }}" class="btn btn-light btn-sm">
                                    <i class="fas fa-arrow-left" style="margin-left: 5px;"></i> رجوع
                                </a>

                            </div>
        </div>
    </div>
</div>
@endsection
