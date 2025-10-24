@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">إضافة مهمة جديدة</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf

                        {{-- 🧾 عنوان المهمة --}}
                        <div class="mb-3">
                            <label for="title" class="form-label">عنوان المهمة</label>
                            <input type="text" name="title" id="title"
                                   value="{{ old('title') }}"
                                   class="form-control @error('title') is-invalid @enderror" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 📝 الوصف --}}
                        <div class="mb-3">
                            <label for="description" class="form-label">الوصف</label>
                            <textarea name="description" id="description" rows="3"
                                      class="form-control @error('description') is-invalid @enderror" >{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 🔄 الحالة --}}
                        <div class="mb-3">
                            <label for="status" class="form-label">الحالة</label>
                            <select name="status" id="status"
                                    class="form-select @error('status') is-invalid @enderror" required>
                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>completed</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>overdue</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 👤 المستخدم --}}
                        {{-- <div class="mb-3">
                            <label for="user_id" class="form-label">المستخدم</label>
                            <select name="user_id" id="user_id"
                                    class="form-select @error('user_id') is-invalid @enderror" required>
                                <option value="">اختر مستخدم</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> --}}

                        {{-- 📅 التاريخ --}}
                        <div class="mb-3">
                            <label for="data" class="form-label">تاريخ المهمة</label>
                            <input type="date" name="data" id="data"
                                   value="{{ old('data') }}"
                                   class="form-control @error('data') is-invalid @enderror" required>
                            @error('data')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 🔘 الأزرار --}}
                        <div class="d-flex justify-content-between">
                            {{-- <a href="{{ route('dashboard') }}" class="btn btn-secondary">رجوع</a> --}}
                            <button type="submit" class="btn btn-success">حفظ المهمة</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
