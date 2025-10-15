@extends('Dashboard.master')

@section('content')
    <div class="product-section mt-150 mb-150" style="direction: rtl;">
        <div class="container">
            <!-- عنوان الصفحة -->
            <div class="row justify-content-center mb-4">
                <div class="col-lg-8 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">عرض</span> المنتج</h3>
                        <p>تفاصيل المنتج كاملة</p>
                    </div>
                </div>
            </div>

            <!-- تفاصيل المنتج -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow" style="border: none;">
                        <div class="card-body">
                            <div class="row">
                                <!-- صورة المنتج -->
                                <div class="col-md-5 text-center mb-4 mb-md-0">
                                    <img src="{{ asset($product->image_path) }}" alt="Product Image"
                                        class="img-fluid rounded" style="max-height: 300px;">
                                </div>

                                <!-- بيانات المنتج -->
                                <div class="col-md-7">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th>الاسم:</th>
                                            <td>{{ $product->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>الاسم بالإنجليزية:</th>
                                            <td>{{ $product->name_en }}</td>
                                        </tr>
                                        <tr>
                                            <th>السعر:</th>
                                            <td>{{ number_format($product->price, 2) }} ج.م</td>
                                        </tr>
                                        <tr>
                                            <th>الكمية:</th>
                                            <td>{{ $product->quantity }}</td>
                                        </tr>
                                        <tr>
                                            <th>القسم:</th>
                                            <td>{{ $product->category->name ?? 'غير محدد' }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <!-- وصف المنتج -->
                            <div class="mt-4">
                                <h5 class="mb-2">الوصف:</h5>
                                <div class="p-3 bg-light rounded" style="line-height: 1.8; font-size: 15px;">
                                    {{ $product->description }}
                                </div>
                            </div>

                            <!-- أزرار التحكم -->
                            <div class="mt-4 d-flex flex-wrap justify-content-start" style="gap: 10px;">

                                <a href="/editproduct/{{ $product->id }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit" style="margin-left: 5px;"></i> تعديل
                                </a>

                                <form action="/removeproduct/{{ $product->id }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا المنتج؟')">
                                        <i class="fas fa-trash" style="margin-left: 5px;"></i> حذف
                                    </button>
                                </form>

                                <a href="/addimagetoproduct/{{ $product->id }}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-image" style="margin-left: 5px;"></i> إضافة صور
                                </a>

                                <a href="/producttable" class="btn btn-light btn-sm">
                                    <i class="fas fa-arrow-left" style="margin-left: 5px;"></i> رجوع
                                </a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
