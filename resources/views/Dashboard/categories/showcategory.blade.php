@extends('Dashboard.master')

@section('content')
    <div class="category-section mt-5 mb-5" style="direction: rtl;">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-lg-8 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">عرض</span> القسم</h3>
                        <p>تفاصيل القسم بالكامل</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow" style="border: none;">
                        <div class="card-body">
                            <div class="row">
                                <!-- صورة القسم -->
                                <div class="col-md-5 text-center mb-4 mb-md-0">
                                    <img src="{{ asset($category->image_path) }}" alt="Category Image"
                                        class="img-fluid rounded" style="max-height: 300px;">
                                </div>

                                <!-- تفاصيل القسم -->
                                <div class="col-md-7">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th>الاسم:</th>
                                            <td>{{ $category->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>الاسم بالإنجليزية:</th>
                                            <td>{{ $category->name_en }}</td>
                                        </tr>
                                        @if(isset($category->price))
                                        <tr>
                                            <th>السعر:</th>
                                            <td>{{ number_format($category->price, 2) }} ج.م</td>
                                        </tr>
                                        @endif
                                        @if(isset($category->quantity))
                                        <tr>
                                            <th>الكمية:</th>
                                            <td>{{ $category->quantity }}</td>
                                        </tr>
                                        @endif
                                    </table>
                                </div>
                            </div>

                            <!-- الوصف -->
                            <div class="mt-4">
                                <h5 class="mb-2">الوصف:</h5>
                                <div class="p-3 bg-light rounded" style="line-height: 1.8; font-size: 15px;">
                                    {{ $category->description }}
                                </div>
                            </div>

                            <!-- أزرار التحكم -->
                            <div class="mt-4 d-flex flex-wrap justify-content-start">
                                <a href="/editcategory/{{ $category->id }}" class="btn btn-primary btn-sm me-2 mb-2">
                                    <i class="fas fa-edit"></i> تعديل
                                </a>

                                <form action="/removecategory/{{ $category->id }}" method="POST" style="display:inline;" class="me-2 mb-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('هل أنت متأكد من حذف هذا القسم؟')">
                                        <i class="fas fa-trash"></i> حذف
                                    </button>
                                </form>

                                <a href="/categorytable" class="btn btn-light btn-sm mb-2">
                                    <i class="fas fa-arrow-left"></i> رجوع
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
