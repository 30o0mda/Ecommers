@extends('Dashboard.master')

@section('content')
    <div class="container mt-5">

        {{-- زر إضافة مستخدم --}}
        {{-- <div class="text-right">
            <a href="{{ route('users.index') }}" class="btn btn-primary mt-5 mb-5 w-45">
                <i class="fas fa-plus"></i>
                إضافة مستخدم
            </a>
        </div> --}}

        {{-- جدول المستخدمين --}}
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>الهاتف</th>
                    <th>نوع المستخدم</th>
                    <th>الحالة</th>
                    <th>تاريخ التسجيل</th>
                    <th>الإجراء</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->role->label() }}</td>
                        <td>{{ $user->is_blocked->label() }}</td>
                        <td>{{ $user->created_at->format('Y-m-d') }}</td>
                        <td>
                            <div class="d-flex flex-wrap">
                                {{-- زر عرض --}}
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm action-btn">
                                    <i class="fas fa-eye"></i> عرض
                                </a>

                                {{-- زر تعديل --}}
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm action-btn">
                                    <i class="fas fa-edit"></i> تعديل
                                </a>

                                {{-- زر حذف --}}
                                <form action="{{ route('users.delete', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm action-btn"
                                        onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا المستخدم؟')">
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
            let table = new DataTable('#myTable');
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
    </style>
@endsection
