@extends('Dashboard.master')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4">تعديل الكوبون: {{ $coupon->code }}</h3>

    {{-- عرض أخطاء التحقق --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- فورم تعديل الكوبون --}}
    <form action="{{ route('admin.updatecoupon', $coupon->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="code">كود الكوبون <span class="text-danger">*</span></label>
            <input type="text" name="code" id="code" class="form-control" required value="{{ old('code', $coupon->code) }}">
        </div>

        <div class="form-group mb-3">
            <label for="type">نوع الخصم <span class="text-danger">*</span></label>
            <select name="type" id="type" class="form-control" required>
                <option value="">-- اختر النوع --</option>
                <option value="1" {{ old('type', $coupon->type) == 'fixed' ? 'selected' : '' }}>خصم ثابت</option>
                <option value="2" {{ old('type', $coupon->type) == 'percent' ? 'selected' : '' }}>خصم بنسبة مئوية</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="value">قيمة الخصم <span class="text-danger">*</span></label>
            <input type="number" name="value" id="value" step="0.01" class="form-control" required value="{{ old('value', $coupon->value) }}">
        </div>

        <div class="form-group mb-3">
            <label for="min_purchase">الحد الأدنى للشراء</label>
            <input type="number" name="min_purchase" id="min_purchase" step="0.01" class="form-control" value="{{ old('min_purchase', $coupon->min_purchase) }}">
        </div>

        <div class="form-group mb-3">
            <label for="usage_limit">عدد مرات الاستخدام</label>
            <input type="number" name="usage_limit" id="usage_limit" class="form-control" value="{{ old('usage_limit', $coupon->usage_limit) }}">
        </div>

        <div class="form-group mb-3">
            <label for="start_date">تاريخ البداية</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', $coupon->start_date) }}">
        </div>

        <div class="form-group mb-3">
            <label for="end_date">تاريخ النهاية</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date', $coupon->end_date) }}">
        </div>

        <div class="form-group mb-4">
            <label for="is_active">هل الكوبون مفعل؟</label>
            <select name="is_active" id="is_active" class="form-control">
                <option value="1" {{ old('is_active', $coupon->is_active) == 1 ? 'selected' : '' }}>نعم</option>
                <option value="0" {{ old('is_active', $coupon->is_active) == 0 ? 'selected' : '' }}>لا</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> حفظ التعديلات
        </button>

        <a href="{{ route('admin.coupontable') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> رجوع
        </a>
    </form>
</div>
@endsection
