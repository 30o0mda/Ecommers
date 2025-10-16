@extends('Dashboard.master')

@section('content')
    <div class="container mt-5">

        {{-- زر إضافة كوبون --}}
        <div class="text-right">
            <a href="{{ route('admin.addcoupon') }}" class="btn btn-primary mt-5 mb-5 w-45">
                <i class="fas fa-plus"></i>
                إضافة كوبون
            </a>
        </div>

        {{-- جدول الكوبونات --}}
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>#</th>
                    <th>كود الكوبون</th>
                    <th>النوع</th>
                    <th>القيمة</th>
                    <th>الحد الأدنى للشراء</th>
                    <th>عدد الاستخدامات</th>
                    <th>تاريخ البداية</th>
                    <th>تاريخ النهاية</th>
                    <th>الحالة</th>
                    <th>الإجراء</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coupons as $coupon)
                {{-- @dd($coupon->type->value) --}}
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $coupon->code }}</td>
                        <td>{{ (int)$coupon->type->value == App\Http\Enums\TypeCouponEnum::Fixed->value  ? 'ثابت' : 'نسبة' }}</td>
                        <td>{{ $coupon->value }}</td>
                        <td>{{ $coupon->min_purchase ?? '-' }}</td>
                        <td>{{ $coupon->used }} / {{ $coupon->usage_limit ?? 'غير محدد' }}</td>
                        <td>{{ $coupon->start_date ?? '-' }}</td>
                        <td>{{ $coupon->end_date ?? '-' }}</td>
                        <td>
                            @if($coupon->is_active)
                                <span class="badge bg-success">مفعل</span>
                            @else
                                <span class="badge bg-secondary">معطل</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex flex-wrap">
                                {{-- زر تعديل --}}
                                <a href="{{ route('admin.editcoupon', $coupon->id) }}" class="btn btn-primary btn-sm action-btn">
                                    <i class="fas fa-edit"></i> تعديل
                                </a>

                                {{-- زر حذف --}}
                                <form action="{{ route('admin.removecoupon', $coupon->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm action-btn"
                                        onclick="return confirm('هل أنت متأكد من حذف الكوبون؟')">
                                        <i class="fas fa-trash"></i> حذف
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection

{{-- سكربت وتنسيقات --}}
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new DataTable('#myTable');
        });
    </script>

    <style>
        .action-btn {
            margin: 0 5px 10px 0;
        }

        table#myTable th,
        table#myTable td {
            vertical-align: middle !important;
            text-align: center;
            white-space: nowrap;
        }

        .badge {
            padding: 5px 10px;
            font-size: 0.85em;
        }
    </style>
@endsection
