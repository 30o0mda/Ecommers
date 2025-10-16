@extends('Dashboard.master')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">

            <h4 class="mb-4">تفاصيل الكوبون</h4>

            <p><strong>الكود:</strong> {{ $coupon->code->Label() }}</p>
            <p><strong>نوع الخصم:</strong>
                @if($coupon->type == App\Http\Enums\TypeCouponEnum::Fixed->value)
                    خصم ثابت
                @elseif($coupon->type == App\Http\Enums\TypeCouponEnum::Percent->value)
                    خصم بالنسبة المئوية
                @endif
            </p>
            <p><strong>قيمة الخصم:</strong> {{ $coupon->value }}</p>

            @if($coupon->min_purchase)
                <p><strong>الحد الأدنى للشراء:</strong> {{ $coupon->min_purchase }}</p>
            @endif

            @if($coupon->usage_limit)
                <p><strong>عدد مرات الاستخدام المسموح بها:</strong> {{ $coupon->usage_limit }}</p>
            @endif

            <p><strong>عدد مرات الاستخدام الفعلي:</strong> {{ $coupon->used }}</p>

            @if($coupon->start_date)
                <p><strong>تاريخ البداية:</strong> {{ $coupon->start_date }}</p>
            @endif

            @if($coupon->end_date)
                <p><strong>تاريخ النهاية:</strong> {{ $coupon->end_date }}</p>
            @endif

            <p><strong>الحالة:</strong>
                @if($coupon->is_active)
                    <span class="badge bg-success">مفعل</span>
                @else
                    <span class="badge bg-danger">غير مفعل</span>
                @endif
            </p>

            {{-- أزرار التحكم --}}
            <div class="mt-4 d-flex flex-wrap" style="gap: 10px;">
                <a href="{{ route('admin.editcoupon', $coupon->id) }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-edit"></i> تعديل
                </a>

                <form action="{{ route('admin.removecoupon', $coupon->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('هل أنت متأكد من حذف هذا الكوبون؟')">
                        <i class="fas fa-trash"></i> حذف
                    </button>
                </form>

                <a href="{{ route('admin.coupontable') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> رجوع
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
