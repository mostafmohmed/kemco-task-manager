@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    تعديل المهمة
                </div>

                <div class="card-body">

                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- العنوان --}}
                        <div class="mb-3">
                            <label for="title" class="form-label">عنوان المهمة</label>
                            <input type="text" name="title" id="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title', $task->title) }}">

                            {{-- الخطأ تحت الحقل مباشرة --}}
                            @error('title')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- الوصف --}}
                        <div class="mb-3">
                            <label for="description" class="form-label">الوصف</label>
                            <textarea name="description" id="description" rows="4"
                                      class="form-control @error('description') is-invalid @enderror">{{ old('description', $task->description) }}</textarea>

                            @error('description')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- الحالة --}}
                        <div class="mb-3">
                            <label for="status" class="form-label">الحالة</label>
                            <select name="status" id="status"
                                    class="form-select @error('status') is-invalid @enderror">
                                <option value="">اختر الحالة</option>
                                <option value="1" {{ old('status', $task->status) == 1 ? 'selected' : '' }}>completed</option>
                                <option value="0" {{ old('status', $task->status) == 0 ? 'selected' : '' }}>overdue</option>
                            </select>

                            @error('status')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- أزرار --}}
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">رجوع</a>
                            <button type="submit" class="btn btn-success">حفظ التعديلات</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
