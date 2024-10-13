@extends('layout')

@section('content')
    <<div class="container">
    <h1 class="my-4 text-center">{{ $project->title }}</h1>

    <div class="row">
        <div class="col-md-5">
            <img src="/storage/{{ $project->image }}" class="img-fluid w-10" alt="{{ $project->title }}" style="max-height: 250px; object-fit: cover;">
            
            @foreach ($project->skills as $skill)
                <li class="list-inline-item">
                    <span class="badge badge-info">{{ $skill->name }}</span>
                </li>
            @endforeach
        </div>

        <div class="col-md-6">
            <p>{{ $project->description }}</p>

            <a href="{{ $project->github_url ?? '#' }}" class="btn btn-dark my-2" target="_blank">
                <i class="fab fa-github"></i> View GitHub
            </a>
            <a href="{{ $project->demo_url ?? '#' }}" class="btn btn-primary my-2" target="_blank">
                <i class="fas fa-desktop"></i> View Demo
            </a>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center mt-4">
  <a href="{{ route('index') }}" class="btn btn-secondary">Back to Projects</a>
</div>
@endsection
