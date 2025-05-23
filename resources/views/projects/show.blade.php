@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <img src="{{ Storage::url($project->image) }}" class="card-img-top" alt="{{ $project->title }}">
                    <div class="card-body">
                        <h2 class="card-title">{{ $project->title }}</h2>
                        <p class="card-text">{{ $project->description }}</p>

                        @if ($project->project_url)
                            <p>
                                <strong>Project URL:</strong>
                                <a href="{{ $project->project_url }}" target="_blank">{{ $project->project_url }}</a>
                            </p>
                        @endif

                        <p>
                            <strong>Status:</strong>
                            <span
                                class="badge bg-{{ $project->status === 'published' ? 'success' : 'warning' }}">{{ $project->status }}</span>
                        </p>

                        <div class="mt-4">
                            <a href="{{ route('projects.edit', $project) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('projects.destroy', $project) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back to Projects</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
