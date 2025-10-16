@extends('Dashboard.master')

@section('content')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="mb-4">تعديل بيانات المستخدم</h4>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul style="margin-bottom: 0;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('post')
                    <div class="form-group mb-3">
                        <label><strong>الاسم:</strong></label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label><strong>البريد الإلكتروني:</strong></label>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label><strong>رقم الهاتف:</strong></label>
                        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                    </div>

                    <div class="form-group mb-3">
                        <label><strong>نوع المستخدم:</strong></label>
                        <select name="role" class="form-control" required>
                            <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>مدير</option>
                            <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>مشرف</option>
                            <option value="3" {{ $user->role == 3 ? 'selected' : '' }}>مستخدم</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label><strong>حالة المستخدم:</strong></label>
                        <select name="is_blocked" class="form-control">
                            <option value="0" {{ $user->is_blocked == 0 ? 'selected' : '' }}>مفعل</option>
                            <option value="1" {{ $user->is_blocked == 1 ? 'selected' : '' }}>محظور</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">تحديث</button>
                    <a href="{{ route('users.index' , $user->id) }}" class="btn btn-secondary">رجوع</a>
                </form>
            </div>
        </div>
    </div>
@endsection
