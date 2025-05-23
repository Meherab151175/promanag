@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Projects</h2>
            <a href="{{ route('projects.create') }}" class="btn btn-primary">Add New Project</a>
        </div>

        <div class="row">
            @foreach ($projects as $project)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ Storage::url($project->image) }}" class="card-img-top" alt="{{ $project->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <p class="card-text">{{ Str::limit($project->description, 100) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span
                                    class="badge bg-{{ $project->status === 'published' ? 'success' : 'warning' }}">{{ $project->status }}</span>
                                <div class="btn-group">
                                    <a href="{{ route('projects.show', $project) }}"
                                        class="btn btn-sm btn-outline-secondary">View</a>
                                    <a href="{{ route('projects.edit', $project) }}"
                                        class="btn btn-sm btn-outline-primary">Edit</a>
                                    <form action="{{ route('projects.destroy', $project) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
