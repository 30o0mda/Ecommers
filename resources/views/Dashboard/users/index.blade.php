@extends('Dashboard.master')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4">المستخدمين</h3>
    <table id="myTable" class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>البريد الإلكتروني</th>
                <th>تاريخ التسجيل</th>
                <th>إجراء</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('Y-m-d') }}</td>
                <td>
                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i> عرض
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('script')
<script>
    new DataTable('#myTable');
</script>
@endsection
