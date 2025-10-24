{{-- @extends('layouts.app')

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

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">لوحة التحكم</h2>

    <div class="row">
        {{-- إجمالي المهام --}}
        <div class="col-md-4 mb-3">
            <div class="card text-center shadow-sm border-primary">
                <div class="card-body">
                    <h5 class="card-title text-primary">إجمالي المهام</h5>
                    <h2>{{ $totalTasks }}</h2>
                </div>
            </div>
        </div>

        {{-- المهام المكتملة --}}
        <div class="col-md-4 mb-3">
            <div class="card text-center shadow-sm border-success">
                <div class="card-body">
                    <h5 class="card-title text-success">المهام المكتملة</h5>
                    <h2>{{ $completedTasks }}</h2>
                </div>
            </div>
        </div>

        {{-- المهام المتأخرة --}}
        <div class="col-md-4 mb-3">
            <div class="card text-center shadow-sm border-danger">
                <div class="card-body">
                    <h5 class="card-title text-danger">المهام المتأخرة</h5>
                    <h2>{{ $overdueTasks }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
