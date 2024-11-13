@extends('layouts.app')

@section('content')
    <h1 class="text-success mb-4"><i class="fas fa-plus"></i> Add New Task</h1>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Oops!</strong> There were some problems with your input.
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li><i class="fas fa-exclamation-circle"></i> {{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-tasks"></i></span>
                <input type="text" name="title" class="form-control" placeholder="Enter task title" 
                       value="{{ old('title') }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                <textarea name="description" class="form-control" placeholder="Enter task description">{{ old('description') }}</textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Save Task
        </button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </form>
@endsection
