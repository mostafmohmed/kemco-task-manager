@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                <h4 class="mb-3"> task list</h4>
                 <form method="GET" action="{{ route('tasks.index') }}" class="row g-2 mb-4">
                        <div class="col-md-5">
                            <input type="text" name="title" value="{{ request('title') }}" class="form-control" placeholder="ابحث بالعنوان">
                        </div>

                        <div class="col-md-4">
                            <select name="status" class="form-select">
                                <option value="">كل الحالات</option>
                                <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>completed</option>
                                <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>overdue</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary w-100">تصفية</button>
                        </div>
                    </form>
                    <a href="{{route('tasks.create')}}" class="btn btn-primary w-100"> انشاء</a>
                    <table class="table table-hover align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>العنوان</th>
                                <th>الوصف</th>
                                <th>المستخدم</th>
                                <th>التاريخ</th>
                                <th>الحالة</th>
                                <th>التحكم</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tasks as $task)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->description }}</td>
                                    <td>{{ $task->user?->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($task->data)->format('Y-m-d') }}</td>
                                    <td>
                                        @if($task->status)
                                            <span class="badge bg-success">completed</span>
                                        @else
                                            <span class="badge bg-secondary">overdue</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">تعديل</a>
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">لا توجد مهام حالياً</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>





                </div>
            </div>
        </div>
    </div>
</div>
@endsection
